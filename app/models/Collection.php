<?php

namespace App\models;

use App\helpers\Connection;

class Collection
{

    public static function all()
    {
        $query = Connection::make()->query("SELECT * FROM collections");
        return $query->fetchAll();
    }
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT id, name FROM categories WHERE id=?");
        $query->execute([$id]);
        return $query->fetch();
    }
    public static function add($name)
    {
        $query = Connection::make()->prepare("SELECT `id` FROM `categories` WHERE name=?");
        $query->execute([$name]);
        if (!$query->fetch()) {
            $query = Connection::make()->prepare("INSERT INTO `categories`(`name`) VALUES (?)");
            $query->execute([$name]);
            return true;
        }else return false;
         
    }
    public static function del($category_id){
        
        $query = Connection::make()->prepare("DELETE FROM `categories` WHERE id=?");
        $query->execute([$category_id]);
    }
}
