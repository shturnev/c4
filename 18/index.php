<?php
if  ($_POST["method_name"] == "send_one" && $_FILES['photo']['tmp_name']){
    $aads = 1;
    if ($_FILES['photo']['error'])
    {
        exit('есть ошибка');
    }
    $mimes=[
        'image/jpeg'=>'jpg',
        'image/png'=>'png',
        'image/gif'=>'gif'
    ];
    if  (!$mimes[$_FILES['photo']['type']]){
        exit('не подходит тип');
    }
    $size=$_FILES['photo']['size']/ pow(1024, 3);

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
<form action="" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="metod_name" value="send_one">
    <input type="file" name="photo" id=""/>


    <input name="submit" type="submit" value="готово"/>
</form>




<script type="text/javascript" src=""></script>
</body>
</html>
