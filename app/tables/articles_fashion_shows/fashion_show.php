<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$link="fashion_shows";
$articles=Articles::fashion_shows();
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/fashion_shows/fashion_shows.view.php";