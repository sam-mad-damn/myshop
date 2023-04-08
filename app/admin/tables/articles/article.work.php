<?php

use App\models\Articles;
use App\models\Collection;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stream = file_get_contents("php://input");
if ($stream != null) {
    //находим айди продукта декодируя полученные данные из объекта(наш айдишник товара)
    $id = json_decode($stream)->data??false;
    $action=json_decode($stream)->action;
    $result = match ($action){
        "find"=>Articles::find($id)
    } ;
    $photo=Articles::find_photo($id);
    echo json_encode([
        "result"=>$result,
        "photo"=>$photo
    ], JSON_UNESCAPED_UNICODE);
}