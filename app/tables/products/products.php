<?php

use App\models\Basket;
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

// переход со страницы коллекций
if (isset($_GET["collection_id"])) {
    $products_positions = Product::get_products_by_collection($_GET["collection_id"]);
}
// сортировка по цене
if (isset($_GET["sort"])) {
    $sort = $_GET['sort'];
    switch ($sort) {
        case "price_dec":
            $products_positions = Product::sort_by_price_desc($_GET);
            break;
        case "price_asc":
            $products_positions = Product::sort_by_price($_GET);
            break;
    }
}
// фильтрация по признакам
if (isset($_GET["collection"]) && isset($_GET["material"]) && isset($_GET["size"]) && isset($_GET["price"])) {
    $products_positions = Product::filter($_GET);
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/products.view.php";
