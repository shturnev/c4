<?php
require_once "blocks/autoload.php";


//Регистриция
if($_POST["method_name"] == "get_types" && $_POST["cat_id"])
{
    $T = new Type();

    try{
        $res = $T->get_few($_POST);
        echo json_encode($res);
        exit;
    }
    catch(Exception $e){
        $error_text = $e->getMessage();
        exit( json_encode(["error" => $error_text]) );
    }

}
