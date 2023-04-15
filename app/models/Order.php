<?php

namespace App\models;

use App\helpers\Connection;

class Order
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT orders.*, users.name as user, statuses.name as status FROM orders INNER JOIN users ON orders.user_id=users.id INNER JOIN statuses ON orders.status_id=statuses.id ORDER BY orders.updated_at DESC");
        return $query->fetchAll();
    }

    public static function create($user_id, $point_id,$pay_type)
    {
        //получаем корзину пользователя
        $basket = Basket::get_basket($user_id);
        //установим подключение для работы с транзиакцией
        $conn = Connection::make();
        //транзакция
        try {
            //начинаем(запускаем) транзакцию
            $conn->beginTransaction();
            //1.создаем новый заказ(ловим его айдишник)
            $order_id = self::add_order($user_id, $point_id,$pay_type, $conn);
            //2.добавляем продукты в заказ
            self::add_products($basket, $order_id, $conn);
            //3.корректируем кол-во продуктов на складе
            Product::update_count($basket, $conn);
            //4.очистка корзины пользователя
            Basket::clean($user_id, $conn);

            //принимаем транзакцию
            $conn->commit();
        } catch (\PDOException $error) {
            //откатываем(отклоняем) транзакцию в случае ошибки
            $conn->rollBack();
            echo ("Ошибка!" . $error->getMessage());
        }
    }
    //добавление записи в таблицу заказа
    public static function add_order($user_id, $point_id,$pay_type, $conn)
    {
        $query = $conn->prepare("INSERT INTO `orders`(`created_at`, `updated_at`, `status_id`, `user_id`, `point_id`,pay_type) VALUES (:created_at,:updated_at,1,:user_id,:point_id,:pay_type)");
        $query->execute(["created_at" => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s"), "user_id" => $user_id, "point_id" => $point_id,"pay_type"=>$pay_type]);
        //получаем номер последней вставленной записи(т. е. Id заказа)
        return $conn->lastInsertId();
    }
    //клеит строку
    private static function getParams($array, $value)
    {
        return implode(",", array_fill(0, count($array), $value));
    }
    //добавление записи в таблицу продукты заказа
    public static function add_products($basket, $order_id, $conn)
    {
        $queryBase = "INSERT INTO `orders_products`(`order_id`,`product_id`, `size_id`,`quantity`) VALUES ";
        $queryBase .= self::getParams($basket, "(?,?,?,?)");
        $arr = [];
        foreach ($basket as $product) {
            $arr[] = $order_id;
            $arr[] = $product->product_id;
            $arr[] = $product->size_id;
            $arr[] = $product->quantity;
        }
        $query = $conn->prepare($queryBase);
        $query->execute($arr);
    }
    //ищем товары в заказе пользователя
    public static function get_products($user_id)
    {
        // $order_id=self::find_by_user($user_id);
        $query = Connection::make()->prepare(
            "SELECT
        orders.`id`,
        statuses.name AS status,
        points.name AS point,
        orders_products.quantity,
        orders_products.size_id,
        orders_products.product_id,
        sizes.value AS size,
        products_positions.name AS name,
        products_positions.description AS description,
        products_positions.price AS product_price,
        products_positions.photo
    FROM
        orders
    INNER JOIN statuses ON orders.status_id = statuses.id
    INNER JOIN points ON orders.point_id = points.id
    INNER JOIN orders_products ON orders_products.order_id = orders.id
    INNER JOIN sizes ON orders_products.size_id = sizes.id
    INNER JOIN products ON products.product_position_id = orders_products.product_id
    INNER JOIN products_positions ON products_positions.id = products.product_position_id
    WHERE
        orders.user_id =:user_id AND orders_products.product_id = products.product_position_id AND orders_products.size_id = products.size_id"
        );
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll();
    }
    //ищем покупки пользователя
    public static function get_buys($user_id)
    {
        // $order_id=self::find_by_user($user_id);
        $query = Connection::make()->prepare(
            "SELECT
        orders.`id`,
        statuses.name AS status,
        points.name AS point,
        orders_products.quantity,
        orders_products.size_id,
        orders_products.product_id,
        sizes.value AS size,
        products_positions.name AS name,
        products_positions.description AS description,
        products_positions.price AS product_price,
        products_positions.photo
    FROM
        orders
    INNER JOIN statuses ON orders.status_id = statuses.id
    INNER JOIN points ON orders.point_id = points.id
    INNER JOIN orders_products ON orders_products.order_id = orders.id
    INNER JOIN sizes ON orders_products.size_id = sizes.id
    INNER JOIN products ON products.product_position_id = orders_products.product_id
    INNER JOIN products_positions ON products_positions.id = products.product_position_id
    WHERE
    orders.status_id=4 AND
        orders.user_id =:user_id AND orders_products.product_id = products.product_position_id AND orders_products.size_id = products.size_id"
        );
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll();
    }

    //получение списка статусов
    public static function getStatuses()
    {
        $query = Connection::make()->query("SELECT * FROM statuses ");
        return $query->fetchAll();
    }
    //изменение статуса заказа
    public static function confirmOrder($order_id)
    {
        $query = Connection::make()->prepare("UPDATE `orders` SET `status_id`=2,cancel_reason=null,`updated_at`=? WHERE id=?");
        $query->execute([date("Y-m-d H:i:s"), $order_id]);
        return self::find($order_id);
    }
    //изменение статуса заказа
    public static function completeOrder($order_id)
    {
        $query = Connection::make()->prepare("UPDATE `orders` SET `status_id`=4,cancel_reason=null,`updated_at`=? WHERE id=?");
        $query->execute([date("Y-m-d H:i:s"), $order_id]);
        return self::find($order_id);
    }
    //отклонение заказа
    public static function cancelOrder($order_id, $reason_cancel)
    {
        $query = Connection::make()->prepare("UPDATE `orders` SET `status_id`=5,cancel_reason=?,`updated_at`=? WHERE id=?");
        $query->execute([$reason_cancel, date("Y-m-d H:i:s"), $order_id]);
        return self::all();
    }
    //фильтрация по статусу
    public static function filterByStatus($status_id)
    {
        $query = Connection::make()->prepare("SELECT orders.*, users.name as user, statuses.name as status FROM orders INNER JOIN users ON orders.user_id=users.id INNER JOIN statuses ON orders.status_id=statuses.id WHERE orders.status_id=? ORDER BY orders.updated_at DESC");
        $query->execute([$status_id]);
        return $query->fetchAll();
    }
    //ищем итоговую стоимость всех товаров в заказе пользователя
    public static function get_total_cost($order_id)
    {
        $query = Connection::make()->prepare("SELECT
        SUM(
            orders_products.quantity * products_positions.price
        ) AS total_sum
    FROM
        orders_products
    INNER JOIN products ON orders_products.product_id = products.product_position_id
    INNER JOIN products_positions ON products_positions.id=products.product_position_id
    WHERE products.product_position_id=products_positions.id AND orders_products.size_id=products.size_id AND orders_products.order_id=:order_id");
        $query->execute(["order_id" => $order_id]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }
    //ищем общее кол-во товаров в заказе пользователя
    public static function get_total_count($order_id)
    {
        $query = Connection::make()->prepare("SELECT
        SUM(quantity) AS total_count
    FROM
        orders_products
    WHERE
        order_id = :order_id");
        $query->execute(["order_id" => $order_id]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }
    //поиск заказа по его статуса
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT
        orders.*,
        users.name AS user,
        statuses.name AS status,
        cities.name as city,
        points.name as point
        FROM
        orders
        INNER JOIN users ON orders.user_id = users.id
        INNER JOIN statuses ON orders.status_id = statuses.id
        INNER JOIN points ON orders.point_id=points.id
        INNER JOIN cities ON points.city_id=cities.id
        WHERE
        orders.id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }
    //поиск заказа по пользователю
    public static function find_by_user($user_id)
    {
        $query = Connection::make()->prepare("SELECT
        orders.*,
        statuses.name as status,
        points.name as point
    FROM
        orders
        INNER JOIN statuses ON orders.status_id=statuses.id
        INNER JOIN points ON orders.point_id=points.id
    WHERE
        orders.user_id = :user_id");
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll();
        // return self::get_products($user_id);
    }
    // 
      //получаем айди товаров в заказе пользователя
      public static function getProducts($order_id)
      {
          $query = Connection::make()->prepare(
          "SELECT
          users.name AS user,
          orders.id AS order_id,
          orders_products.product_id,
          sizes.value as size,
          products_positions.name,
          products_positions.description,
          products_positions.price,
          orders_products.quantity,
          products_positions.photo,
          statuses.name AS status,
          orders.created_at AS created_at,
          orders.updated_at AS updated_at,
          orders.pay_type
      FROM
          `orders_products`
      INNER JOIN products ON orders_products.product_id = products.product_position_id
      INNER JOIN products_positions ON products.product_position_id = products_positions.id
      INNER JOIN orders ON orders_products.order_id = orders.id
      INNER JOIN statuses ON orders.status_id = statuses.id
      INNER JOIN users ON orders.user_id = users.id
      INNER JOIN sizes ON products.size_id=sizes.id
      WHERE
      orders_products.size_id=products.size_id AND
          order_id = ?");
          $query->execute([$order_id]);
          return $query->fetchAll();
      }
}
