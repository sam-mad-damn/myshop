<?php

use App\models\Collection;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$arr=explode("/",Collection::find($_POST["collect_id"])->main_photo);
$name=$_SERVER["DOCUMENT_ROOT"]."/".$arr[3]."/".$arr[4]."/".$arr[5];

unlink($name);
Collection::del($_POST["collect_id"]);

header("Location: /app/admin/tables/collections/collections.php");