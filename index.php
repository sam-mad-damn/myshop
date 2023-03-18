<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
$link="style";
$products=array_slice(Product::all(),0,3);
include_once $_SERVER["DOCUMENT_ROOT"]."/views/index.view.php";