<?php

$DB = new mysqli('127.0.0.1', 'root', '', 'b4'); //pdo
if($DB->connect_error){
    exit($DB->connect_error);
}


/*-----------------------------------
insert
-----------------------------------*/
$sql = "INSERT INTO test (nickname) VALUES ('сЕРгей')";
$resQuery = $DB->query($sql);
if(!$resQuery){
    $DB->close();
    echo $DB->error; exit;
}

/*-----------------------------------
update
-----------------------------------*/
$sql = "UPDATE test SET nickname='John' WHERE ID = 3";
$resQuery = $DB->query($sql);
if(!$resQuery){
    $DB->close();
    echo $DB->error; exit;
}

/*-----------------------------------
DELETE
-----------------------------------*/
$sql = "DELETE FROM test WHERE ID = 2";
$resQuery = $DB->query($sql);
if(!$resQuery){
    $DB->close();
    echo $DB->error; exit;
}

/*-----------------------------------
SELECT
-----------------------------------*/
$sql        = "SELECT * FROM test WHERE ID > 100";
$resQuery   = $DB->query($sql);
if(!$resQuery){
    $DB->close();
    echo $DB->error; exit;
}

if($resQuery->num_rows > 0)
{
    $rows1 = $resQuery->fetch_array(MYSQLI_ASSOC);
    $rows2 = $resQuery->fetch_array(MYSQLI_ASSOC);
    $rows3 = $resQuery->fetch_all(MYSQLI_ASSOC);

//    $rows[0]["ID"] = 4;
}
$nnn = $resQuery->num_rows;



$DB->close();


$dsdsd = 1;


?>

