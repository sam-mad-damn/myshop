<?php

use App\models\Product;
use App\models\Basket;

include_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$link="product";

if(isset($_GET["id"])){
    $product=Product::find_position($_GET["id"]);
}
if(isset($_GET["position_id"])){
    $product=Product::find_position($_GET["position_id"]);
}
if($product){
$collection_products=Product::get_3_products_by_collection($product->collection_id);
}

if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
   $basket_products=Basket::get_basket($_SESSION["id"]); 
}


include_once $_SERVER["DOCUMENT_ROOT"]."/views/products/product.view.php";

