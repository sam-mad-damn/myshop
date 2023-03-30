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

// if (!empty($_GET) && isset($_GET["category_id"])) {
//     if($_GET["category_id"]=="all"){
//         $products=Product::all();
//     }else{
        
//     $products = Product::sorting("category_id", $_GET["category_id"]);
//     $text=" категории ".Category::find($_GET["category_id"])->name;
//     $countries = Country::all();
//     $categories = Category::all();
//     }
// }
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/products.view.php";
