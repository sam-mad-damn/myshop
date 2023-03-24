<?php

namespace App\models;

use App\helpers\Connection;

class Articles
{
    // public static function get_photos_by_article($article_id)
    // {
    //     $query = Connection::make()->prepare("SELECT shows_photo.* FROM shows_photo WHERE `article_id`=? ");
    //     $query->execute([$article_id]);
    //     return $query->fetchAll();
    // }
    // public static function fashion_shows()
    // {
    //     $query = Connection::make()->query("SELECT * FROM `articles_fashion_shows` WHERE 1");
    //     return $query->fetchAll();
    // }
    // public static function get_articles_help($id)
    // {
    //     $query = Connection::make()->prepare("SELECT
    //     articles_help.*
    //     FROM
    //     `articles_help`
    //     WHERE
    //     head_id = :id");
    //     $query->execute(["id" => $id]);
    //     return $query->fetchAll();
    // }
    // получаем заголовки статей Помощи
    public static function get_heads_help()
    {
        $query = Connection::make()->query("SELECT * FROM `articles_heads` WHERE id NOT LIKE 6");
        return $query->fetchAll();
    }
    // получаем заголовки статей показов
    public static function get_heads_shows()
    {
        $query = Connection::make()->query("SELECT * FROM `articles_heads` WHERE id=6");
        return $query->fetch();
    }
    
    // получаем статьи указанного заголовка
    public static function get_articles($id){
        $query=Connection::make()->prepare("SELECT * FROM `articles` WHERE `head_id`=:head_id");
        $query->execute(["head_id"=>$id]);
        return $query->fetchAll();
    }
    // получаем фото указанных статей
    public static function get_photos($id){
        $query=Connection::make()->prepare("SELECT * FROM `articles_photos` WHERE `article_id`=:id");
        $query->execute(["id"=>$id]);
        return $query->fetchAll();
    }
}
