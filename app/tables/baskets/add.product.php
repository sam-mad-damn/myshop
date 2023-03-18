<?php

use App\models\Basket;
use App\models\Order;
use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
//var_dump($_GET);
if (isset($_SESSION["auth"])) {
    if (!isset($_GET["size"])) {
        $_SESSION["error"]["size"] = "Выберите размер";
        header("Location: /app/tables/products/product.php?id=" . $_GET['product_position_id']);
    } else {
        $product = Product::find($_GET["product_position_id"], $_GET["size"]);
        if ($product) {
            var_dump($product);
            var_dump(Basket::add($product->id, $product->size_id, $_SESSION["id"]));
            header("Location: /app/tables/products/product.php?id=" . $_GET['product_position_id']);
            $_SESSION["good"] = "Товар добавлен в корзину!";
            $_SESSION["size_id"] = $product->size_id;
        }
    }
} else {
    header("Location: /app/tables/products/product.php?id=" . $_GET['product_position_id']);
    $_SESSION["error"]['auth'] = "Вы не вошли в личный кабинет";
}
