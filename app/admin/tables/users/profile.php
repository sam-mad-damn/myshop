<?php
use App\models\User;
include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$link="admin_profile";
$user = User::find($_SESSION["id"]);
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/profile.view.php";