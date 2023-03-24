<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if (isset($_GET["exit"])) {
    unset($_SESSION["auth"]);
    session_unset();
    session_destroy();
}
header("Location: /");
