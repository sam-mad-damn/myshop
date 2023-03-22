<?php

namespace App\models;

use App\helpers\Connection;

class Articles
{
    public static function get_photos_by_article($article_id)
    {
        $query = Connection::make()->prepare("SELECT shows_photo.* FROM shows_photo WHERE `article_id`=? ");
        $query->execute([$article_id]);
        return $query->fetchAll();
    }
    public static function fashion_shows()
    {
        $query = Connection::make()->query("SELECT * FROM `articles_fashion_shows` WHERE 1");
        return $query->fetchAll();
    }
    public static function get_articles_help($id)
    {
        $query = Connection::make()->prepare("SELECT
        articles_help.*
        FROM
        `articles_help`
        WHERE
        head_id = :id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }
    public static function get_help_head()
    {
        $query = Connection::make()->query("SELECT * FROM `help_head`");
        return $query->fetchAll();
    }
}
