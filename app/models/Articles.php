<?php

namespace App\models;

use App\helpers\Connection;

class Articles
{
    public static function help(){
        $query = Connection::make()->query("SELECT * FROM `articles_help` WHERE 1");
        return $query->fetchAll();
    }
    public static function get_photos_by_article($article_id){
        $query = Connection::make()->prepare("SELECT shows_photo.* FROM shows_photo WHERE `article_id`=? ");
        $query->execute([$article_id]);
        return $query->fetchAll();
    }
    public static function fashion_shows(){
        $query = Connection::make()->query("SELECT * FROM `articles_fashion_shows` WHERE 1");
        return $query->fetchAll();
    }
}