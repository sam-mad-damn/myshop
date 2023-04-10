<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

var_dump($_POST);
var_dump($_FILES);

if (isset($_FILES["photo"])) {
    foreach ($_FILES["photo"]["error"] as $key => $error) {

        $name_file = $_FILES["photo"]["name"][$key];
        $tmp_name = $_FILES["photo"]["tmp_name"][$key];
        $error = $error;
        $size = $_FILES["photo"]["size"][$key];
        var_dump($error);

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
                    if (!move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"] . "/upload/shows/" . $new_name)) {
                        $_SESSION["error"] = "Ошибка: не удалось загрузить изображение товара";
                    }else{
                        $photos[] = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/upload/shows/" . $new_name;
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
    }
    $_POST["photo"]=$photos;
}

//если нет ошибок в сессии
if (empty($_SESSION["error"])) {

    $_SESSION["good"] = "Показ успешно добавлен";
    if (isset($_POST["add"])) {
        var_dump($_POST);
        $name = htmlspecialchars($_POST["name"]);
        $desc = htmlspecialchars($_POST["desc"]);
        if (strlen($name) >= 10) {
            Articles::add_article_show($_POST);
        } else {
            $_SESSION["error"] = "Не удалось добавить показ(некорректно указано имя)";
        }
    }
}

header("Location: /app/admin/tables/shows/show.php");
