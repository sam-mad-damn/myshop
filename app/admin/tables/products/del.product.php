<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
var_dump($_POST);
$arr=explode("/",Product::find_position($_POST["product_id"])->photo);
$name=$_SERVER["DOCUMENT_ROOT"]."/".$arr[3]."/".$arr[4];

unlink($name);
Product::delProduct($_POST["product_id"]);

header("Location: /app/admin/tables/products/products.php");