<?php

use App\models\Collection;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$link="admin_collections";

$collections=Collection::all();

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/collections.view.php";