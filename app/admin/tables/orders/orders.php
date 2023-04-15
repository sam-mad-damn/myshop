<?php

use App\models\Order;
use App\models\Order_product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$link="admin_orders";

$orders=Order::all();
$statuses=Order::getStatuses();
// фильтрация заказов по статусу
if(!empty($_GET) && isset($_GET["status_id"])){
    if($_GET["status_id"]=="all"){
        $orders=Order::all();
    }else{
        $orders=Order::filterByStatus($_GET["status_id"]);
        if(!empty($orders)){
            $text=" статуса ".$orders[0]->status;
        }
    }
}

// завершение заказа
if(isset($_GET["order_id"])){
    Order::completeOrder($_GET["order_id"]);
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/orders.view.php";