<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


var_dump($_FILES);
var_dump($_POST);


unset($_SESSION["error"]);
unset($_SESSION["good"]);

// корректируем массив с кол-вом товаров по размерам
    $counts;
    foreach ($_POST["count_by_size"] as $key => $item) {
        if ($item == "0") {
            unset($_POST["count_by_size"][$key]);
        } else {
            $counts[] = $item;
        }
    }
    if(!empty($counts)){
        $_POST["count_by_size"] = $counts;
    }else{
        unset($_POST["size"]);
    }
    



if (isset($_FILES["photo"])) {

    $_POST["photo"] = Product::find($_POST["product_id"])->photo;

    if (empty($_FILES["photo"]["name"])) {
        // не изменяем фото, если оно не выбрано
        $res = Product::change_product_position($_POST);
        header("Location: /app/admin/tables/products/products.php");
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
                    header("Location: /app/admin/tables/products/products.php");
                } else {
                    //проверка загрузки файла
                    $new_name = time() . "_" . $name;
                    if (!move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"] . "/upload/" . $new_name)) {
                        $_SESSION["error"] = "не удалось загрузить изображение товара";
                    } else {
                        header("Location: /app/admin/tables/products.php");
                    }
                }
            }
        } else {
            $_SESSION["error"] = "расширение файла должно быть : " . implode(", ", $extensions);
            header("Location: /app/admin/tables/products/products.php");
        }

        //если нет ошибок в сессии
        if (empty($_SESSION["error"])) {
            $_SESSION["good"] = "Товар успешно изменен";
            // формируем новое название для нового изображения
            $_POST["photo"] = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/upload/" . $new_name;
            $arr = explode("/", Product::find($_POST["product_id"])->photo);
            $res = Product::change_product_position($_POST);
            header("Location: /app/admin/tables/products/products.php");
        }
    }
};
