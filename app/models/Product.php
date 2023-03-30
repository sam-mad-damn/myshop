<?php

namespace App\models;

use App\helpers\Connection;

class Product
{
    //получаем товары отсортированные по новизне при условии что они есть на складе
    public static function all()
    {
        $query = Connection::make()->query("SELECT products_positions.*,materials.name as material,collections.name as collection FROM products_positions 
        INNER JOIN materials ON materials.id=products_positions.material_id
        INNER JOIN collections ON collections.id=products_positions.collection_id ORDER BY created_at ASC ");
        return $query->fetchAll();
    }
    // 
    public static function all_products()
    {
        $query = Connection::make()->query("SELECT products.product_position_id as product_id,products.count, products.size_id, materials.name as material,collections.name as collection, products_positions.* FROM products_positions INNER JOIN products ON products.product_position_id=products_positions.id
        INNER JOIN materials ON materials.id=products_positions.material_id
        INNER JOIN collections ON collections.id=products_positions.collection_id
         WHERE products.count>0");
        return $query->fetchAll();
    }
    //все размеры в базе
    public static function get_all_sizes()
    {
        $query = Connection::make()->query("SELECT sizes.* FROM sizes ");
        return $query->fetchAll();
    }
    //размеры определенного товара
    public static function get_product_sizes($id)
    {
        $query = Connection::make()->prepare("SELECT products.*, sizes.value as size FROM products INNER JOIN sizes ON products.size_id=sizes.id WHERE product_position_id=:id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }
    // 
    public static function get_product_count($id)
    {
        $query = Connection::make()->prepare("SELECT SUM(count) as sum FROM `products` WHERE `product_position_id`=:product");
        $query->execute(["product" => $id]);
        return $query->fetch();
    }
    //ищем товар на складе по его id
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT products_positions.*, 
        materials.name as material, 
        collections.name as collection, 
        products.count as count,
        products.size_id as size_id
        FROM products_positions 
        INNER JOIN collections ON products_positions.collection_id=collections.id 
        INNER JOIN materials ON products_positions.material_id=materials.id 
        INNER JOIN products ON products.product_position_id=products_positions.id 
        WHERE products.product_position_id=:id");
        $query->execute(["id" => $id]);
        return $query->fetch();
        // if (!$query->fetch()) {
        //     $query = Connection::make()->prepare("SELECT products_positions.*, 
        //         materials.name as material, 
        //         collections.name as collection
        //         FROM products_positions 
        //         INNER JOIN collections ON products_positions.collection_id=collections.id 
        //         INNER JOIN materials ON products_positions.material_id=materials.id 
        //         WHERE products_positions.id=:id");
        //     $query->execute(["id" => $id]);
        //     return $query->fetch();
        // }
    }
    public static function find_position($id)
    {
        $query = Connection::make()->prepare("SELECT products_positions.*, 
        materials.name as material, 
        collections.name as collection
        FROM products_positions 
        INNER JOIN collections ON products_positions.collection_id=collections.id 
        INNER JOIN materials ON products_positions.material_id=materials.id 
        WHERE products_positions.id=:id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }
    //получаем 3 товара из коллекции
    public static function get_3_products_by_collection($collection)
    {
        $query = Connection::make()->prepare("SELECT products_positions.* FROM products_positions WHERE collection_id=:id LIMIT 3");
        $query->execute(["id" => $collection]);
        return $query->fetchAll();
    }
    //получаем все товары указанной коллекции
    public static function get_products_by_collection($collection)
    {
        $query = Connection::make()->prepare("SELECT products_positions.* FROM products_positions WHERE collection_id=:id");
        $query->execute(["id" => $collection]);
        return $query->fetchAll();
    }
    //формируем строку с позиционными параметрами
    private static function getParams($array)
    {
        return implode(",", array_fill(0, count($array), "?"));
    }
    //получаем товары по указанным категориям
    // public static function getProductsByManyCategories($collections)
    // {
    //     $params = self::getParams($collections);

    //     $query = Connection::make()->prepare("SELECT products_positions.* FROM products_positions WHERE collection_id IN($params)");
    //     $query->execute($collections);
    //     return $query->fetchAll();
    // }
    public static function filter($data)
    {
        foreach ($data as $key => $val) {
            if ($val == "all") {
                $data[$key] = "%%";
            }
        }
        $query = Connection::make()->prepare("SELECT
        `id`,
        `name`,
        `description`,
        `photo`,
        `price`
        FROM
            `products_positions`
        INNER JOIN products ON products.product_position_id = products_positions.id
        WHERE
            products.size_id LIKE :size AND products_positions.collection_id LIKE :collection AND products_positions.material_id LIKE :material AND products_positions.price < :price
        GROUP BY
            id");
        $query->execute([
            "size" => $data["size"],
            "collection" => $data["collection"],
            "material" => $data["material"],
            "price" => $data["price"]
        ]);
        return $query->fetchAll();
    }

    //сортируем товары по цене сначала дешевые
    public static function sort_by_price()
    {
        $query = Connection::make()->prepare("SELECT
        `id`,
        `name`,
        `description`,
        `photo`,
        `price`
        FROM
        `products_positions`
        INNER JOIN products ON products.product_position_id = products_positions.id GROUP BY
        id
        ORDER BY
        price
        ");
        $query->execute([]);
        return $query->fetchAll();
    }
    //сортируем товары по цене сначала дорогие
    public static function sort_by_price_desc()
    {
        $query = Connection::make()->prepare("SELECT
        `id`,
        `name`,
        `description`,
        `photo`,
        `price`
        FROM
        `products_positions`
        INNER JOIN products ON products.product_position_id = products_positions.id GROUP BY
        id
        ORDER BY
        price DESC");
        $query->execute([]);
        return $query->fetchAll();
    }
    //обновляем кол-во товара на складе
    public static function update_count($basket, $conn = null)
    {
        //проверяем наличие подключение
        $conn = $conn ?? Connection::make();

        $query = $conn->prepare("UPDATE products SET count=count-:count WHERE product_position_id=:product_id");
        //написать без цикла
        foreach ($basket as $product) {
            //подготовили параметры в нужном типе
            $query->bindValue("count", $product->quantity, \PDO::PARAM_INT);
            $query->bindValue("product_id", $product->product_id, \PDO::PARAM_INT);

            $query->execute();
        }
    }
    public static function add_material()
    {
    }
    //добавление товарной позиции
    public static function add_product_position($data)
    {
        //добавляем в базу материал
        Material::add($data["material"]);
        // и находим его айди
        $material_id = Material::find($data["material"])->id;

        $conn = Connection::make();
        //добавляем товар в базу
        $query = $conn->prepare("INSERT INTO `products_positions`(`name`, `description`, `photo`, `price`, `created_at`, `material_id`, `collection_id`) VALUES (:name,:desc,:photo,:price,:created_at,:material_id,:collection_id)");
        $query->execute([
            "name" => $data["name"],
            "desc" => $data["desc"],
            "photo" => $data["photo"],
            "price" => $data["price"],
            "created_at" =>  date("Y-m-d H:i:s"),
            "material_id" => $material_id,
            "collection_id" => $data["collection"],
        ]);
        //добавляем размеры товара в базу
        $product_position_id = $conn->lastInsertId();
        foreach ($data["size"] as $size_id) {
            self::add_product($size_id, $product_position_id, $conn);
        }
    }
    //добавление продукта
    public static function add_product($size_id, $product_position_id, $conn)
    {
        $query = $conn->prepare("INSERT INTO `products`(`count`, `product_position_id`, `size_id`) VALUES (1,:product_position_id,:size_id)");
        $query->execute([
            "product_position_id" => $product_position_id,
            "size_id" => $size_id,
        ]);
        return $query->fetch();
    }
    //удаление товара 
    public static function delProduct($product_id)
    {
        $query = Connection::make()->prepare("DELETE FROM `products` WHERE id=?");
        $query->execute([$product_id]);
        return true;
    }
    //изменение товара 
    public static function changeProduct($data)
    {
        $query = Connection::make()->prepare("UPDATE `products` SET `name`=:name,`price`=:price,`count`=:count,`release_year`=:year,`color`=:color,`image`=:image,`country_id`=:country_id,`category_id`=:category_id,`updated_at`=:updated_at WHERE id=:product_id");
        return $query->execute([
            "name" => $data["name"],
            "price" => $data["price"],
            "count" => $data["count"],
            "year" => $data["year"],
            "color" => $data["color"],
            "image" => $data["image"],
            "country_id" => $data["country_id"],
            "category_id" => $data["category_id"],
            "updated_at" => date("Y-m-d H:i:s"),
            "product_id" => $data["id"]
        ]);
    }
}
