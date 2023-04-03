<?php

use App\models\Collection;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION['error']);

if (isset($_FILES["photo"])) {
    
    $name_file = $_FILES["photo"]["name"];
    $tmp_name = $_FILES["photo"]["tmp_name"];
    $error = $_FILES["photo"]["error"];
    $size = $_FILES["photo"]["size"];

    //проверка расширения файла
    $extensions = ["png", "gif", "jpeg", "jpg", "webp", "jfif"];
    $path_parts = pathinfo($name_file);

    //проверка типа файла
    $mime_types = ["image/gif", "image/png", "image/jpeg", "image/webp", "image/jfif"];
    $type_file = mime_content_type($tmp_name);

    //если расширение и тип файла допустимы
    if (in_array($path_parts["extension"], $extensions) && in_array($type_file, $mime_types)) {
        //если в массиве FILES нет ошибок 
        if ($error == 0) {
            
            //проверка размера
            if ($size >= 3145728) {
                $_SESSION["error"] = "Ошибка: изображение слишком большое";
                die();
            } else {
                
                //проверка загрузки файла
                $new_name = time() . "_" . $name_file;
                if (!move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"] . "/upload/collections/" . $new_name)) {
                    $_SESSION["error"] = "Ошибка: не удалось загрузить изображение товара";
                } 
            }
        } else {
            $_SESSION["error"] = "Ошибка: выберите файл";
            die();
        };
    } else {
        $_SESSION["error"] = "Ошибка: расширение файла должно быть : " . implode(", ", $extensions);
        die();
    }
    
    //если нет ошибок в сессии
    if (empty($_SESSION["error"])) {
        
        $_SESSION["good"] = "Коллекция успешно добавлена";
        if (isset($_POST["add"])) {
            $_POST["photo"] = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/upload/collections/" . $new_name;
            
            $name = htmlspecialchars($_POST["name"]);
            $desc = htmlspecialchars($_POST["description"]);
            if (strlen($name) >= 10) {
                Collection::add($_POST);
            } else {
                $_SESSION["error"] = "Не удалось добавить категорию(некорректно указано имя)";
            }
        }
    }
}
header("Location: /app/admin/tables/collections/collections.php");
