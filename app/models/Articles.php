<?php

namespace App\models;

use App\helpers\Connection;

class Articles
{
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
    public static function get_articles($id)
    {
        $query = Connection::make()->prepare("SELECT * FROM `articles` WHERE `head_id`=:head_id");
        $query->execute(["head_id" => $id]);
        return $query->fetchAll();
    }
    // получаем статьи 
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT
         articles.*,
         articles_heads.head
     FROM
         `articles`
     INNER JOIN articles_heads ON articles.head_id = articles_heads.id
     WHERE
         articles.id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }
    // получаем статьи указанного заголовка
    public static function get_all_articles()
    {
        $query = Connection::make()->query("SELECT articles.*,articles_heads.head FROM `articles` INNER JOIN articles_heads ON articles.head_id=articles_heads.id WHERE head_id NOT LIKE 6");
        return $query->fetchAll();
    }
    // получаем фото указанных статей
    public static function get_photos($id)
    {
        $query = Connection::make()->prepare("SELECT * FROM `articles_photos` WHERE `article_id`=:id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }
    // получаем фото указанных статей
    public static function find_photo($id)
    {
        $query = Connection::make()->prepare("SELECT photo FROM `articles_photos` WHERE `article_id`=:id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }
    // добавляем статью показа мод
    public static function add_article_show($data)
    {
        $conn = Connection::make();

        $query = $conn->prepare("INSERT INTO `articles`(`title`, `text`, `head_id`) VALUES (:name,:desc,6)");
        $query->execute([
            "name" => $data["name"],
            "desc" => $data["desc"]
        ]);
        $article_id = $conn->lastInsertId();
        // добавляем фотографии
        foreach ($data["photo"] as $item) {
            self::add_photo($item, $article_id, $conn);
        }
    }
    // добавляем статью помощт
    public static function add_article_help($data)
    {
        $conn = Connection::make();

        $query = $conn->prepare("INSERT INTO `articles`(`title`, `text`, `head_id`) VALUES (:name,:desc,:head)");
        $query->execute([
            "name" => $data["name"],
            "desc" => $data["desc"],
            "head" => $data["head"]
        ]);
        $article_id = $conn->lastInsertId();
        // добавляем фотографию если она есть
        if (isset($data["photo"])) {
            self::add_photo($data["photo"], $article_id, $conn);
        }
    }
    // добавляем фото статьи
    public static function add_photo($photo, $article_id, $conn)
    {
        $query = $conn->prepare("INSERT INTO `articles_photos`(`photo`, `article_id`) VALUES (:photo,:article_id)");
        $query->execute([
            "photo" => $photo,
            "article_id" => $article_id
        ]);
    }
    // изменяем фото статьи
    public static function change_photo($photo, $article_id)
    {
        $query = Connection::make()->prepare("UPDATE `articles_photos` SET `photo`=:photo WHERE article_id=:article_id");
        $query->execute([
            "photo" => $photo,
            "article_id" => $article_id
        ]);
    }
    // добавляем фото статьи
    public static function del_article($article_id)
    {
        $query = Connection::make()->prepare("DELETE FROM articles WHERE id=:article_id");
        return $query->execute([
            "article_id" => $article_id
        ]);
    }
    // изменяем статью помощи
    public static function change_article_help($data)
    {
        $query = Connection::make()->prepare("UPDATE `articles` SET `title`=:name,`text`=:desc,`head_id`=:head_id WHERE id=:article_id");
        $query->execute([
            "article_id" => $data["article_id"],
            "name" => $data["name"],
            "desc" => $data["desc"],
            "head_id" => $data["head_id"]
        ]);
        if (isset($data["photo"])) {
            if (self::find_photo($data["article_id"]) != false) {
                self::change_photo($data["photo"], $data["article_id"]);
            } else {
                self::add_photo($data["photo"], $data["article_id"], Connection::make());
            }
            // добавляем фотографию если она есть


        }
    }
}
