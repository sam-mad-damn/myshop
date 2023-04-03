<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$link="admin_shows";
$shows=Articles::get_articles(6);

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/shows.view.php";