<?php

use App\models\User;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);

if (isset($_POST["btn_auth"])) {
    $user = User::getUser($_POST["mail"], $_POST["password"]);
    var_dump($user);
    if ($user == null) {
        $_SESSION["auth"] = false;
        $_SESSION["id"] = null;
        $_SESSION["admin"] = false;
        $_SESSION["error"] = "Неверный логин или пароль";
        header("Location: /app/admin");
        die();
    } else {
        if ($user->role == "администратор") {
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $user->id;
            $_SESSION["name"] = $user->name;
            $_SESSION["admin"] = true;
        }
        if ($user->role == "суперадминистратор") {
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $user->id;
            $_SESSION["name"] = $user->name;
            $_SESSION["admin"] = true;
            $_SESSION["superadmin"] = true;
        }
        if ($user->role == "клиент") {
            $_SESSION["auth"] = false;
            $_SESSION["id"] = null;
            $_SESSION["admin"] = false;
            $_SESSION["error"] = "У вас недостаточно прав";
            
        }
    }
}
header("Location: /app/admin");
