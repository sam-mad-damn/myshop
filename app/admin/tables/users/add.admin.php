<?php

use App\models\User;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
var_dump($_POST);
unset($_SESSION["error"]);
if (isset($_POST["btn_reg"])) {
    $name = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $login = htmlspecialchars($_POST["login"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $_POST["name"] = $name;
    $_POST["surname"] = $surname;
    $_POST["login"] = $login;
    $_POST["email"] = $email;

    unset($_POST["btn_reg"]);
    foreach ($_POST as $item) {
        if (empty($item)) {
            $_SESSION["error"] = "Ошибка: некорректно введены данные";
            header("Location: /app/admin/tables/users/profile.php");
        }
    }
    if (empty($_SESSION["error"])) {
        if (User::add_admin($_POST)) {
            $_SESSION["good"] = "Администратор успешно добавлен";
        } else {
            $_SESSION["error"] = "Ошибка: не удалось добавить администратора";
        }
    }
}
header("Location: /app/admin/tables/users/profile.php");
