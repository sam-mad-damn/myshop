<?php

use App\models\Product;
use App\models\Basket;

include_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
$link="style";
$products=array_slice(Product::all(),0,3);
$points = Basket::get_all_points();
include_once $_SERVER["DOCUMENT_ROOT"]."/views/index.view.php";