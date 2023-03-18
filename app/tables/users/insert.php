<?php

use App\models\User;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$name = htmlspecialchars($_POST["name"]);
$surname = htmlspecialchars($_POST["surname"]);
$login = htmlspecialchars($_POST["login"]);
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

var_dump($_POST);
if (isset($_POST["btn_reg"])) {
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["login"] = $_POST["login"];
    //проверка на пустые поля
    foreach ($_POST as $item ) {
        if (empty($item) && $item!=$_POST["btn_reg"]) {
            $_SESSION["error"]["empty"] = "Заполните поле";
        }
    }
    //проверка на пустой пароль
    if (empty($_POST["password"])) {
        $_SESSION["error"]["emptyPas"] = "Заполните пароль";
    }
    //проверка почты
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"]["mail"] = "E-mail адрес указан неверно.\n";
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
    //проверка на несовпадение паролей
    if ($_POST["password"] != $_POST["confirm_password"]) {
        $_SESSION["error"]["base"] = "Пароли не совпадают <br>";
        //проверка на пользователя в базе
    } else if (User::getUser($_POST["login"], $_POST["password"]) != null) {
        $_SESSION["error"]["base"] = "Такой пользователь уже существует<br>";
    }

    //если ошибок нет
    if (empty($_SESSION["error"])) {
        //если пользователь успешно добавлен в БД
        if (User::insert($_POST)) {
            $_SESSION["auth"] = true;

            $user = User::getUser($_POST["login"], $_POST["password"]);
            $_SESSION["id"] = $user->id;

            header("Location: /");
            die();
        }
    } else {
        header("Location: /app/tables/users/register.php");
    }
}
