<?php

use App\models\Articles;
use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


var_dump($_FILES);
var_dump($_POST);

unset($_SESSION["error"]);
unset($_SESSION["good"]);

if (isset($_POST["change_art"])) {
    // ищем фото статьи
    $photo = Articles::find_photo($_POST["article_id"]);
    var_dump($photo);
    // если нашли, то записываем его в пост
    if ($photo != false) {
        $_POST["photo"] = $photo->photo;
    }
    // если мы не изменяем фото
    if (empty($_FILES["photo"]["name"])) {
        $name = htmlspecialchars($_POST["name"]);
        $desc = htmlspecialchars($_POST["desc"]);
        $_POST["name"] = $name;
        $_POST["desc"] = $desc;
        // не изменяем фото, если оно не выбрано
        $res = Articles::change_article_help($_POST);
        if ($res != null) {
            $_SESSION["error"] = "Ошибка: не удалось изменить статью";
            header("Location: /app/admin/tables/articles/articles.php");
        } else {
            $_SESSION["good"] = "Статья успешно изменена";
            var_dump($res);
            header("Location: /app/admin/tables/articles/articles.php");
        }
    } else {
        // если выбрано новое фото, то удаляем старое
        if ($photo != false) {
            $new = explode("/", $photo->photo);
            var_dump($new);
            unlink($_SERVER["DOCUMENT_ROOT"] . "/upload/helps/" . $new[5]);
        }

        $name = $_FILES["photo"]["name"];
        $tmp_name = $_FILES["photo"]["tmp_name"];
        $error = $_FILES["photo"]["error"];
        $size = $_FILES["photo"]["size"];

        //проверка расширения файла
        $extensions = ["png", "gif", "jpeg", "jpg", "webp", "jfif"];
        $path_parts = pathinfo($name);

        //проверка типа файла
        $mime_types = ["image/gif", "image/png", "image/jpeg", "image/webp", "image/jfif"];
        $type_file = mime_content_type($tmp_name);

        //если расширение и тип файла допустимы
        if (in_array($path_parts["extension"], $extensions) && in_array($type_file, $mime_types)) {
            //если в массиве FILES нет ошибок 
            if ($error == 0) {
                //проверка размера
                if ($size >= 3145728) {
                    $_SESSION["error"] = "изображение слишком большое";
                    header("Location: /app/admin/tables/articles/articles.php");
                } else {
                    //проверка загрузки файла
                    $new_name = time() . "_" . $name;
                    if (!move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"] . "/upload/helps/" . $new_name)) {
                        $_SESSION["error"] = "не удалось загрузить изображение товара";
                    } else {
                        header("Location: /app/admin/tables/articles/articles.php");
                    }
                }
            }
        } else {
            $_SESSION["error"] = "расширение файла должно быть : " . implode(", ", $extensions);
            header("Location: /app/admin/tables/articles/articles.php");
        }


        //если нет ошибок в сессии
        if (empty($_SESSION["error"])) {
            $_SESSION["good"] = "Статья успешно изменена";
            // формируем новое название для нового изображения
            $_POST["photo"] = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/upload/helps/" . $new_name;
            $res = Articles::change_article_help($_POST);

            header("Location: /app/admin/tables/articles/articles.php");
        }
    }
}
