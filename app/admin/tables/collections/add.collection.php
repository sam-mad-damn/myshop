<?php

use App\models\Category;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION['error']);
var_dump($_POST);
if(isset($_POST["add"])){
    $name=htmlspecialchars($_POST["name"]);
    if(strlen($name)>=10){
        Category::add($_POST["name"]);
    }else{
        $_SESSION["error"]="Не удалось добавить категорию(некорректно указано имя)";
    }
}
header("Location: /app/admin/tables/categories/categories.php");