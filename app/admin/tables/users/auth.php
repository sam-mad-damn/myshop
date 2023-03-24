<?php
use App\models\User;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);

if (isset($_POST["btn_auth"])) {
    $user = User::getUser($_POST["mail"], $_POST["password"]);
    if ($user == null) {
        $_SESSION["auth"]=false;
        $_SESSION["id"]=null;
        $_SESSION["admin"]=false;
        $_SESSION["error"] = "Неверный логин или пароль";
        header("Location: /views/admin/");
        die();
     } else{
    if($user->role=="администратор")
        $_SESSION["auth"]=true;
        $_SESSION["id"]=$user->id;
        $_SESSION["name"]=$user->name;
        $_SESSION["admin"]=true;
    header("Location: /views/admin/");
    }
}