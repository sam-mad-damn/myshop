<?php

use App\models\Order;
use App\models\User;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$link="profile";
if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /app/tables/users/register.php");
    die();
}
$user = User::find($_SESSION["id"]);
$orders=Order::find_by_user($user->id);
$order_products=Order::get_products($_SESSION["id"]);
$data = date("d.m") + 3;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/users/profile.view.php";
