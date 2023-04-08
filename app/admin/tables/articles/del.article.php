<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$photo=Articles::find_photo($_POST["article_id"]);
var_dump($_POST);
if(!$photo){
    Articles::del_article($_POST["article_id"]);
}else{
    $arr=explode("/",$photo->photo);
    $name=$_SERVER["DOCUMENT_ROOT"]."/".$arr[3]."/".$arr[4]."/".$arr[5];
    unlink($name);
    Articles::del_article($_POST["article_id"]);
}
$_SESSION["good"]="Статья успешно удалена";
header("Location: /app/admin/tables/articles/articles.php");