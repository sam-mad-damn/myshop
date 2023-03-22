<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
$link="help";
$articles_head=Articles::get_help_head();

include_once $_SERVER["DOCUMENT_ROOT"]."/views/help.view.php";
