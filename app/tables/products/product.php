<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$link="product";
// if(isset($_SESSION["auth"]) && $_SESSION["autth"]){
//     $product=Basket::find()
// }
if(isset($_GET["id"])){
    $product=Product::find($_GET["id"]);
}
if(isset($_GET["position_id"])){
    $product=Product::find($_GET["position_id"]);
}
if($product){
$collection_products=Product::get_3_products_by_collection($product->collection_id);
}
include_once $_SERVER["DOCUMENT_ROOT"]."/views/products/product.view.php";

