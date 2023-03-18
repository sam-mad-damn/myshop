<?php

use App\models\Basket;
use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$link = "cart";
$basket = Basket::get_basket($_SESSION["id"]);
$total_count = Basket::get_total_count($_SESSION["id"]);
$total_sum = Basket::get_total_cost($_SESSION["id"]);

$points = Basket::get_all_points();
if (isset($_GET["point_id"]) && !empty($_GET["point_id"])) {
    $point = Basket::find_point($_GET["point_id"]);
} else {
    $point = $points[array_rand($points)];
}
$data = date("d.m") + 3;
$products=array_slice(Product::all(),0,3);


include_once $_SERVER["DOCUMENT_ROOT"] . "/views/baskets/cart.view.php";
