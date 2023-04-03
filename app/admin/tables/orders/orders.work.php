<?php

use App\models\Order;
use App\models\Order_product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

//получаем поток для работы с входными данными
$stream = file_get_contents("php://input");
if ($stream != null) {
    //находим айди продукта декодируя полученные данные из объекта(наш айдишник товара)
    $arr = json_decode($stream)->data??false;
    $action = json_decode($stream)->action;
    
    $result = match ($action) {
        "confirm" =>Order::confirmOrder($arr),
        "show"=>Order::getProducts($arr),
        "find"=>Order::find($arr)
    };
    
    echo json_encode([
        "result" => $result
    ], JSON_UNESCAPED_UNICODE);
}
?>