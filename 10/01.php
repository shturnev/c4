<?php
require "DB.php";

$DB = new DB();

try{

    $arr = ["nickname" => 'вавававава'];
    $resUpd = $DB->update('test', $arr, 'ID = 22');


    $resRow = $DB->get_rowS("SELECT * FROM test ORDER BY ID DESC");
    $resRow2 = array_reverse($resRow);

}
catch(Exception $e){
    $dsdsdsd = $e;
}


$DSDSD = 1;
