<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stream = file_get_contents("php://input");
if ($stream != null) {
    //находим айди продукта декодируя полученные данные из объекта(наш айдишник товара)
    $arr = json_decode($stream)->data ?? false;
    $product=Product::find($arr);
    if(!$product){
        $product=Product::find_position($arr);
    }
    echo json_encode([
        "product" => $product,
        "sizes"=>Product::get_product_sizes($product->id)
    ], JSON_UNESCAPED_UNICODE);
}
