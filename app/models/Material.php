<?php

namespace App\models;

use App\helpers\Connection;

class Material
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM materials");
        return $query->fetchAll();
    }
    public static function add($name)
    {
        if (!self::find($name)) {
            $query = Connection::make()->prepare("INSERT INTO `materials`(`name`) VALUES (?)");
            $query->execute([$name]);
        } else return null;
    }
    public static function del($name)
    {
        $query = Connection::make()->prepare("DELETE FROM `materials` WHERE name=:name");
        $query->execute(["name" => $name]);
    }
    public static function find($name)
    {
        $query = Connection::make()->prepare("SELECT * FROM `materials` WHERE name=?");
        $query->execute([$name]);
        return $query->fetch();
    }
    // public static function find_products($name)
    // {
    //     $query = Connection::make()->prepare("SELECT products_positions.*, materials.name FROM `products_positions` INNER JOIN materials ON materials.id=products_positions.material_id WHERE materials.name=:name");
    //     $query->execute(["name"=>$name]);
    //     return $query->fetchAll();
    // }
    
}
