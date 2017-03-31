<?php

require "DB.php";

$DB = new DB();

$arr = ['nickname88' => "апапап"];



try{
    $resInsert = $DB->insert('test', $arr);
}
catch(Exception $e){
    $sdsdsd = 1;
}
catch (\MongoDB\Driver\Exception\ExecutionTimeoutException $e)
{

}











//
//$AAA = [1, 2, 5];
//
//echo serialize($AAA);
//
//var_dump(unserialize('a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}'));
