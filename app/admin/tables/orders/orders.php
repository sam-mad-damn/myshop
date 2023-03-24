<?php

use App\models\Order;
use App\models\Order_product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$link="admin_orders";

$orders=Order::all();
$statuses=Order::getStatuses();
if(!empty($_GET) && isset($_GET["status_id"])){
    if($_GET["status_id"]=="all"){
        $orders=Order::all();
    }else{
        $text=" статуса ".Order::find($_GET["status_id"])->status;
        $orders=Order::filterByStatus($_GET["status_id"]);
    }
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/orders.view.php";