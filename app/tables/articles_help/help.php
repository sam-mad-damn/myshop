<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
$link="help";
$articles=Articles::help();

include_once $_SERVER["DOCUMENT_ROOT"]."/views/help.view.php";
