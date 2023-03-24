<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
$link="authorize";
if(isset($_SESSION["auth"]) && $_SESSION['auth']){
    header("Location: /app/tables/users/profile.php");
}
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/users/authorize.view.php";