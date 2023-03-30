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
        if(!self::find($name)){
            $query = Connection::make()->prepare("INSERT INTO `materials`(`name`) VALUES (?)");
            $query->execute([$name]);
        }else return null;
    }
    public static function find($name)
    {
        $query = Connection::make()->prepare("SELECT * FROM `materials` WHERE name=?");
        $query->execute([$name]);
        return $query->fetch();
    }
}
