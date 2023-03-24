<?php

use App\models\Articles;
use App\models\Order;
use App\models\Product;
use App\models\Collection;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$link="admin_index";

$orders_count=count(Order::all());
$products_count=count(Product::all());
$collections_count=count(Collection::all());
$shows_count=count(Articles::get_articles(6));


include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/index.view.php";