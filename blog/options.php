<?php
require_once "blocks/autoload.php";

/*-----------------------------------
Удалить запись из blog
-----------------------------------*/
if($_GET["method_name"] == "del_blog" && is_numeric($_GET["ID"])){
    $B = new Blog();
    $U = new User();

    if(!$U->is_admin($_COOKIE["user_id"])){
        exit("Не достаточно прав");
    }

    try{
        $B->delete($_GET["ID"]);
        header("Location: index.php");
    }
    catch(Exception $e){
        exit($e->getMessage());
    }


}