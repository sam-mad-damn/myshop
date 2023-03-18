<?php

use App\models\User;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);

if (isset($_POST["save_profile"])) {
    $name = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $login = htmlspecialchars($_POST["login"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $_POST["user_id"] = $_SESSION["id"];
    var_dump($_POST);
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["login"] = $_POST["login"];
    
    //проверка почты
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"]["email"] = "E-mail адрес указан неверно.\n";
    }
    //проверка логина
    if (!preg_match("/^[A-Z]*[a-z]+\-*\s*$/", $_SESSION["login"])) {
        $_SESSION["error"]["login"] = "Логин введен некорректно";
    }
    //проверка имени
    if (!preg_match("/^[а-яА-Я]{2,}$/ui", $name)) {
        $_SESSION["error"]["name"] = "Имя введено некорректно";
    }
    //проверка фамилии
    if (!preg_match("/^[А-ЯЁ\s-]+$/ui", $surname)) {
        $_SESSION["error"]["surname"] = "Фамилия введена некорректно";
    }
    //если ошибок нет
    if (empty($_SESSION["error"])) {
        //если пользователь успешно добавлен в БД
        if (User::update($_POST)) {
            header("Location: /app/tables/users/profile.php");
            die();
        }
    } else {
        header("Location: /app/tables/users/profile.php");
    }
}
