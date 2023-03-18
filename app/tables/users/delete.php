<?php

use App\models\User;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootsrtap.php";

if (isset($_POST["btn_del"])) {
    $userObj = new User();
    $userObj->delete($_POST["id"]);
}
header("Location: /");
