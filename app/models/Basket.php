<?php

namespace App\models;

use App\helpers\Connection;

class Basket
{
    //получаем корзину пользователя
    public static function get_basket($user_id)
    {
        $query = Connection::make()->prepare("SELECT
        baskets.quantity,
        baskets.size_id,
        baskets.product_id,
        baskets.quantity * products_positions.price AS price_position,
        sizes.value as size,
        products_positions.name,
        products_positions.description,
        products_positions.price,
        products_positions.photo
        FROM baskets
        INNER JOIN products ON baskets.product_id = products.product_position_id
        INNER JOIN products_positions ON products.product_position_id = products_positions.id
        INNER JOIN sizes ON products.size_id=sizes.id
        WHERE
        baskets.user_id = :user_id AND baskets.product_id=products_positions.id AND baskets.size_id=products.size_id");
        $query->execute(["user_id" => $user_id,]);
        return $query->fetchAll();
    }
    //получение всех пунктов выдачи из базы
    public static function get_all_points()
    {
        $query = Connection::make()->query("SELECT points.id,cities.name as city, points.name,points.work_time FROM `points`, cities WHERE cities.id=points.city_id");
        return $query->fetchAll();
    }
    public static function find_point($id)
    {
        $query = Connection::make()->prepare("SELECT points.id,cities.name as city, points.name,points.work_time FROM `points`, cities WHERE cities.id=points.city_id AND points.id=?");
        $query->execute([$id]);
        return $query->fetch();
    }
    public static function find_points_by_city($id)
    {
        $query = Connection::make()->prepare("SELECT points.id,cities.name as city, points.name,points.work_time FROM `points`, cities WHERE cities.id=points.city_id AND points.city_id=?");
        $query->execute([$id]);
        return $query->fetchAll();
    }
    public static function get_point_cities(){
        $query = Connection::make()->query("SELECT * FROM cities WHERE 1");
        return $query->fetchAll();
    }
    //поиск товара в корзине пользователя
    public static function find($product_id, $size_id, $user_id)
    {
        $query = Connection::make()->prepare("SELECT baskets.id as basket_id,
        baskets.quantity, 
        products_positions.*, 
        baskets.quantity*products_positions.price as price_position,
        products.count as count,
        products.product_position_id as product_id,
        sizes.value as size,
        sizes.id as size_id
         FROM baskets INNER JOIN products ON baskets.product_id=products.product_position_id INNER JOIN products_positions ON products.product_position_id=products_positions.id INNER JOIN sizes ON products.size_id=sizes.id WHERE baskets.user_id=:user_id AND products.product_position_id=:product_id AND products.size_id=:size_id ");
        $query->execute([
            "product_id" => $product_id,
            "size_id" => $size_id,
            "user_id" => $user_id
        ]);
        return $query->fetch();
    }
    //добавление товар в корзину пользователя
    public static function add($product_id, $size_id, $user_id)
    {
        //поищем товар в корзине у пользователя
        $product_in_basket = self::find($product_id, $size_id, $user_id);

        //ищем такой товар на складе
        $product = Product::find($product_id);

        //проверяем если товара нет в корзине, то добавить его в корзину кол-ве 1
        if (!$product_in_basket) {
            $insert = Connection::make()->prepare("INSERT INTO `baskets`(`quantity`, `product_id`, `size_id`, `user_id`) VALUES (1,?,?,?)");
            $insert->execute([$product_id, $size_id, $user_id,]);
        } else {
            //иначе если кол-во товара в корзине не превысит то, что есть на складе то увеличить кол-во товара в корзине на 1
            if ($product_in_basket->quantity < $product->count) {
                $update = Connection::make()->prepare("UPDATE baskets SET quantity=quantity+1 WHERE user_id=:user_id AND product_id=:product_id AND size_id=:size_id ");
                $update->execute([
                    "user_id" => $user_id,
                    "product_id" => $product_id,
                    "size_id" => $size_id
                ]);
            }
        }
        return self::find($product_id, $size_id, $user_id);
    }
    //уменьшение товара в корзине пользователя на 1
    public static function dec($product_id, $size_id, $user_id)
    {
        $product_in_basket = self::find($product_id, $size_id, $user_id);

        if ($product_in_basket->quantity > 1) {
            $update = Connection::make()->prepare("UPDATE baskets SET quantity=quantity-1 WHERE user_id=:user_id AND product_id=:product_id ");
            $update->execute([
                "user_id" => $user_id,
                "product_id" => $product_id
            ]);
        }
        return self::find($product_id, $size_id, $user_id);
    }
    //удаляем позицию из корзины пользователя
    public static function del($product_id, $size_id, $user_id)
    {
        $query = Connection::make()->prepare("DELETE FROM baskets WHERE user_id=:user_id AND product_id=:product_id AND size_id=:size_id ");
        $query->execute([
            "user_id" => $user_id,
            "product_id" => $product_id,
            "size_id" => $size_id
        ]);
        return false;
    }
    //удаляем корзину выбранного пользователя
    public static function clean($user_id, $conn = null)
    {
        $conn = $conn ?? Connection::make();
        $query = $conn->prepare("DELETE FROM baskets WHERE user_id=:user_id");
        $query->execute(["user_id" => $user_id,]);
        return null;
    }
    //ищем итоговую стоимость всех товаров в корзине пользователя
    public static function get_total_cost($user_id)
    {
        $query = Connection::make()->prepare("SELECT
        SUM(
            baskets.quantity * products_positions.price
        ) AS total_sum
    FROM
        baskets
    INNER JOIN products ON baskets.product_id = products.product_position_id
    INNER JOIN products_positions ON products.product_position_id = products_positions.id
    WHERE
        baskets.user_id =:user_id AND products.size_id=baskets.size_id");
        $query->execute(["user_id" => $user_id]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }
    //ищем общее кол-во товаров в корзине пользователя
    public static function get_total_count($user_id)
    {
        $query = Connection::make()->prepare("SELECT SUM(quantity) as total_count FROM baskets WHERE user_id=:user_id");
        $query->execute(["user_id" => $user_id]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }
}
