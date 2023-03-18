<?php

use App\models\Collection;

include_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
$link="collections";
$collections=Collection::all();
include_once $_SERVER["DOCUMENT_ROOT"]."/views/collections/collections.view.php";