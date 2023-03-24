<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

var_dump($_FILES);
var_dump($_POST);

unset($_SESSION["error"]);
unset($_SESSION["good"]);

if (isset($_FILES["image"])) {

    if (empty($_FILES["image"]["name"])) {
        $_POST["image"] = Product::find($_POST["id"])->image;
        $res = Product::changeProduct($_POST);
        header("Location: /app/admin/tables/products/products.php");
    } else {
        $name = $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        $size = $_FILES["image"]["size"];

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
                    header("Location: /app/admin/tables/products/products.php");
                } else {
                    //проверка загрузки файла
                    $new_name = time() . "_" . $name;
                    if (!move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"] . "/upload/" . $new_name)) {
                        $_SESSION["error"] = "не удалось загрузить изображение товара";
                    } else {
                        //header("Location: /app/admin/tables/products.php");
                    }
                }
            } else {
                $_SESSION["error"] = "выберите файл";
                header("Location: /app/admin/tables/products/products.php");
            };
        } else {
            $_SESSION["error"] = "расширение файла должно быть : " . implode(", ", $extensions);
            header("Location: /app/admin/tables/products/products.php");
        }
        //если нет ошибок в сессии
        if (empty($_SESSION["error"])) {
            $_SESSION["good"] = "Товар успешно изменен";
            if (isset($_POST["save"])) {
                $_POST["image"] = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/upload/" . $new_name;
               // var_dump($_POST["image"]);
                $arr=explode("/",Product::find($_POST["product_id"])->image);
                $nameA=$_SERVER["DOCUMENT_ROOT"]."/upload/".$name;
                unlink($nameA);
                $res = Product::changeProduct($_POST);
               header("Location: /app/admin/tables/products/products.php");
            }
        }
    }
};
