<?php

use App\models\Category;
use App\models\Collection;
use App\models\Country;
use App\models\Material;
use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$link="admin_products";

$products = Product::all();
$collections=Collection::all();
$sizes=Product::get_all_sizes();
// $countries = Country::all();
// $categories = Category::all();
// // if(!empty($_GET) && isset($_GET["status_id"])){
// //     $orders=Order::filterByStatus($_GET["status_id"]);
// // }
if (!empty($_GET) && isset($_GET["collection_id"])) {
    if($_GET["collection_id"]=="all"){
        $products=Product::all();
    }else{
    $products = Product::get_products_by_collection($_GET["collection_id"]);
    $text=" коллекции ".Collection::find($_GET["collection_id"])->name;
    }
}
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/products.view.php";
