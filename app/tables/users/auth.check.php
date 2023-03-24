<?php
use App\models\User;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);

if (isset($_POST["btn_auth"])) {

    $user = User::getUser($_POST["login"], $_POST["password"]);
    
    if ($user == null) {
        $_SESSION["auth"]=false;
        $_SESSION["id"]=null;
        $_SESSION["error"] = "Пользователь с такими данными не найден";
        header("Location: /app/tables/users/auth.php");
        die();
    } else{
        $_SESSION["auth"]=true;
        $_SESSION["id"]=$user->id;
        $_SESSION["name"]=$user->name;
        header("Location: /app/tables/products/products.php");
    }
}