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
        $query = Connection::make()->prepare("SELECT * FROM collections WHERE id=?");
        $query->execute([$id]);
        return $query->fetch();
    }
    public static function add($data)
    {
        $query = Connection::make()->prepare("SELECT `id` FROM `collections` WHERE name=?");
        $query->execute([$data["name"]]);
        if (!$query->fetch()) {
            $query = Connection::make()->prepare("INSERT INTO `collections`(`main_photo`, `name`, `description`) VALUES (:photo,:name,:desc)");
            $query->execute([
                "photo"=>$data["photo"],
                "name"=>$data["name"],
                "desc"=>$data["description"]
            ]);
            return true;
        }else return false;
         
    }
    public static function del($collection_id){
        $query = Connection::make()->prepare("DELETE FROM `collections` WHERE id=?");
        $query->execute([$collection_id]);
    }
}
