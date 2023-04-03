<?php

use App\models\Collection;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stream = file_get_contents("php://input");
if ($stream != null) {
    //находим айди продукта декодируя полученные данные из объекта(наш айдишник товара)
    $arr = json_decode($stream)->data??false;
    $action=json_decode($stream)->action;
    $result = match ($action){
        "find"=>Collection::find($arr)
    } ;
    echo json_encode([
        "result"=>$result
    ], JSON_UNESCAPED_UNICODE);
}