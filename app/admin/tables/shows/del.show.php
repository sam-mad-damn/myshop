<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$photos = Articles::get_photos($_POST["show_id"]);


foreach ($photos as $photo) {
    $arr = explode("/", $photo->photo);
    $name = $_SERVER["DOCUMENT_ROOT"] . "/" . $arr[3] . "/" . $arr[4] . "/" . $arr[5];
   
    unlink($name);
    Articles::del_article($_POST["show_id"]);
}


$_SESSION["good"] = "Показ успешно удален";
header("Location: /app/admin/tables/shows/show.php");
