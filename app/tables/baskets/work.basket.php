<?php

use App\models\Basket;
use App\models\Order;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

//получаем поток для работы с входными данными
$stream = file_get_contents("php://input");
if ($stream != null) {
    //находим айди продукта декодируя полученные данные из объекта(наш айдишник товара)
    $product_id = json_decode($stream)->data->product_id ?? false;
    $size_id = json_decode($stream)->data->size_id ?? false;
    $point_id = json_decode($stream)->data->point ?? false;
    $pay_type = json_decode($stream)->data->pay_type ?? false;
    $action = json_decode($stream)->action;
    //взять айди юзера из сесии
    $user_id = $_SESSION["id"];

    $product_in_basket = match ($action) {
        "add" => Basket::add($product_id, $size_id, $user_id),
        "dec" => Basket::dec($product_id, $size_id, $user_id),
        "del" => Basket::del($product_id, $size_id, $user_id),
        "clean" => Basket::clean($user_id),
        "add_order" => Order::create($user_id, $point_id, $pay_type)
    };
    echo json_encode([
        "product_in_basket" => $product_in_basket,
        "total_cost" => Basket::get_total_cost($user_id),
        "total_count" => Basket::get_total_count($user_id),
    ], JSON_UNESCAPED_UNICODE);
}
