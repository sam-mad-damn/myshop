<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stream = file_get_contents("php://input");
if ($stream != null) {
    //находим айди продукта декодируя полученные данные из объекта(наш айдишник товара)
    $id = json_decode($stream)->data->product_id ?? false;
    $product=Product::find($id);
    if($product==false){
        $product=Product::find_position($id);
    }
    echo json_encode([
        "product" => $product,
        "sizes"=>Product::get_product_sizes($product->id)
    ], JSON_UNESCAPED_UNICODE);
}
