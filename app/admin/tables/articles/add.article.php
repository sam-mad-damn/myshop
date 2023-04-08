<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION['error']);

var_dump($_FILES);
var_dump($_POST);

unset($_SESSION["error"]);
unset($_SESSION["good"]);

unset($_POST["add"]);
foreach ($_POST as $item) {
    if (empty($item)) {
        $_SESSION["error"] = 'Ошибка: вы заполнили не все поля';
        header("Location: /app/admin/tables/articles/articles.php");
        die();
    } else {
        $name = htmlspecialchars($_POST["name"]);
        $desc = htmlspecialchars($_POST["desc"]);
        $_POST["name"] = $name;
        $_POST["desc"] = $desc;
    }
}

if (!empty($_FILES["photo"]["name"])) {
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
                $_SESSION["error"] = "Ошибка: изображение слишком большое";
                header("Location: /app/admin/tables/articles/articles.php");
                // die();
            } else {
                //проверка загрузки файла
                $new_name = time() . "_" . $name;
                if (!move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"] . "/upload/helps/" . $new_name)) {
                    $_SESSION["error"] = "Ошибка: не удалось загрузить изображение товара";
                } else {
                    header("Location: /app/admin/tables/articles/articles.php");
                    // die();
                }
            }
        } else {
            $_SESSION["error"] = "Ошибка: выберите файл";
            header("Location: /app/admin/tables/articles/articles.php");
            // die();
        };
    } else {
        $_SESSION["error"] = "Ошибка: расширение файла должно быть : " . implode(", ", $extensions);
        header("Location: /app/admin/tables/articles/articles.php");
        // die();
    }

    //если нет ошибок в сессии
    if (empty($_SESSION["error"])) {
        $_SESSION["good"] = "Статья успешно добавлен";
        $_POST["photo"] = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . "/upload/helps/" . $new_name;
        var_dump(Articles::add_article_help($_POST));
    }
} else {
    //если нет ошибок в сессии
    if (empty($_SESSION["error"])) {
        $_SESSION["good"] = "Статья успешно добавлен";
        var_dump(Articles::add_article_help($_POST));
    }
}
