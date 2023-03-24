<?php

use App\models\Order;
use App\models\Order_product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$order_products=Order_product::getProducts($_POST["order_id"]);

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/orders.products.view.php";