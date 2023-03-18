<?php

use App\models\Product;
use App\models\Collection;
use App\models\Material;

use const App\helpers\FILTER_PRICE;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$link = "products";

$products_positions = Product::all();
$collections = Collection::all();
$sizes = Product::get_all_sizes();
$materials = Material::all();

$filter_prices = FILTER_PRICE;

if (isset($_GET["collection"]) && isset($_GET["material"]) && isset($_GET["size"]) && isset($_GET["price"])) {
    $products_positions = Product::filter($_GET);
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/products.view.php";
