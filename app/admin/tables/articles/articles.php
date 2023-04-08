<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$link="admin_articles";
$articles = Articles::get_all_articles();
$articles_heads=Articles::get_heads_help();

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/articles.view.php";