<?php
require "../blocks/autoload.php";

$G = new Gallery();

//если была отправленна форма
if($_POST["submit"])
{
    $arr = [
        "table_name" => 'test',
        "table_id"   => 1
    ];

    try{
        $res = $G->add($arr);
    }
    catch(Exception $e){
        exit($e->getMessage());
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href=""/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="file" name="photo[]" multiple/>

    <input name="submit" type="submit" value="готово"/>
</form>

<script type="text/javascript" src=""></script>
</body>
</html>


