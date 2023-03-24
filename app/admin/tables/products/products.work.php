<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stream = file_get_contents("php://input");
if ($stream != null) {
    //находим айди продукта декодируя полученные данные из объекта(наш айдишник товара)
    $arr = json_decode($stream)->data ?? false;
    $result = Product::find($arr);
    echo json_encode([
        "result" => $result
    ], JSON_UNESCAPED_UNICODE);
}
