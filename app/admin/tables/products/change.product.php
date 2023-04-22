<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";




unset($_SESSION["error"]);
unset($_SESSION["good"]);

if (isset($_FILES["photo"])) {

    $_POST["photo"] = Product::find_position($_POST["product_id"])->photo;
    if (empty($_FILES["photo"]["name"])) {
        $name = htmlspecialchars($_POST["name"]);
        $price = htmlspecialchars($_POST["price"]);
        $desc = htmlspecialchars($_POST["desc"]);
        $material = htmlspecialchars($_POST["material"]);
        //проверка 
        if (!preg_match("/^[а-яА-Яa-zA-Z]{2,}$/ui", $name) || !preg_match("/^[1-9]{1}[0-9]{2,}$/ui", $price) || !preg_match("/^[а-яА-Я]{2,}$/ui", $material)) {
            $_SESSION["error"] = "Ошибка: данные введены некорректно";
        } else {
            $_POST["name"] = $name;
            $_POST["price"] = $price;
            $_POST["desc"] = $desc;
            $_POST["material"] = $material;

            // не изменяем фото, если оно не выбрано
            $res = Product::change_product_position($_POST);
            if ($res != null) {
                $_SESSION["error"] = "Ошибка: не удалось изменить товар($res)";
             
            } else {
                $_SESSION["good"] = "Товар успешно изменен";
                
                header("Location: /app/admin/tables/products/products.php");
                
            }
        }
    } else {
        // если выбрано новое фото, то удаляем старое
        $new = explode("/", $_POST["photo"]);
        unlink($_SERVER["DOCUMENT_ROOT"] . "/upload/" . $new[4]);

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
                } else {
                    //проверка загрузки файла
                    $new_name = time() . "_" . $name;
                    if (!move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"] . "/upload/" . $new_name)) {
                        $_SESSION["error"] = "не удалось загрузить изображение товара";
                    }
                }
            }
        } else {
            $_SESSION["error"] = "расширение файла должно быть : " . implode(", ", $extensions);
        }

        //если нет ошибок в сессии
        if (empty($_SESSION["error"])) {
            $_SESSION["good"] = "Товар успешно изменен";
            // формируем новое название для нового изображения
            $_POST["photo"] = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/upload/" . $new_name;
            $arr = explode("/", Product::find_position($_POST["product_id"])->photo);
            $res = Product::change_product_position($_POST);

           
        }
    }
};
header("Location: /app/admin/tables/products/products.php");
