<?php

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>
 
<body>
<main>
<br><br>
<? require "blocks/header.php" ?>
<br><br>

    <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
        <input type="text" name="title" value="" placeholder="email"/><br><br>
        <input type="text" name="title" value="" placeholder="pass"/><br><br>

        <input name="submit" type="submit" value="отправить"/>
    </form>
</main>

<script type="text/javascript" src=""></script>
</body>
</html>
