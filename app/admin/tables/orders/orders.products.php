<?php

use App\models\Order;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$link="admin_orders";
$order_products=Order::getProducts($_POST["order_id"]);

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/orders.products.view.php";