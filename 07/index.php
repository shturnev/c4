<?php

//isset проверка на существрование
    if(isset($_POST["email"]) and $_POST["email"])
    {
        $email = $_POST["email"];

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "спасибо это email";
        }
        else{
            echo "а хты подлец!";
        }
    }


    var_dump($_REQUEST);





?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
    <link rel="stylesheet" type="text/css" media="all" href=""/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<style>
    html{
        padding: 20px;
    }
</style>

<body>

<form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
    <input type="text" name="email" value="" placeholder="email"/><br><br>
    <input type="text" name="nick" value="" placeholder="nickname"/><br><br>

    <input type="file" name="photo" ><br><br>


    <input name="submit" type="submit" value="готово"/>
</form>

<script type="text/javascript" src=""></script>
</body>
</html>