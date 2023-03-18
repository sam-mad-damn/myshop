<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

//если выбрано все, то запускаем метод получить все
if (isset($_GET["collection"])) {
    //декодируем джейсон данные (категории)
    $collections = json_decode($_GET["collection"]);
    if (empty($collections) || $collections == "all") {
        $products = Product::all();
    } else {
        $products = Product::getProductsByManyCategories($collections);
    }
    echo json_encode($products, JSON_UNESCAPED_UNICODE);
}
if (isset($_GET["material"])) {
    //декодируем джейсон данные (категории)
    $materials = json_decode($_GET["material"]);
    if (empty($materials) || $materials == "all") {
        $products = Product::all();
    } else {
        $products = Product::getProductsByManyMaterials($materials);
    }
    echo json_encode($products, JSON_UNESCAPED_UNICODE);
}
