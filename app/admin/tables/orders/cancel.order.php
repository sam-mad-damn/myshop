<?php

use App\models\Order;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if (!empty($_POST) && isset($_POST["cancel_order"])) {
    $reason = htmlspecialchars($_POST["reason_cancel"]);
    //проверка имени
    if (!preg_match("/^[А-ЯЁ]*[а-яё]{10,}$/u", $reason)) {
        $_SESSION["error"] = "Не удалось отменить заказ(причина отмены указана некорректно)";
        header("Location: /app/admin/tables/orders/orders.php");
    }
    if (empty($_SESSION["error"])) {
        header("Location: /app/admin/tables/orders/orders.php");
        Order::cancelOrder($_POST["order_id"], $_POST["reason_cancel"]);
    }
}
