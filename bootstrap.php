<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/config/db.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/helpers/Connection.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/helpers/product_price.php";

include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/User.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Product.php";

include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Order.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Collection.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Material.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Basket.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Articles.php";

