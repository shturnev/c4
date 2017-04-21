<?
require_once 'classes/ByteConverter.php';
require_once 'classes/SimpleImage.php';
$c = new ByteConverter;

if ($_POST['method_name'] == 'send_one' && $_FILES['photo']['tmp_name'])
{
    //1 проверим на ошибки
    if( $_FILES['photo']['error'] ){ exit('есть ошибка'); }


    //проверим на тип
    $mimes = [
        'image/jpeg' => 'jpeg',
        'image/png'  => 'png',
        'image/gif'  => 'gif'
    ];

    if (!$mimes[$_FILES['photo']['type']]) {exit('не поддеривается тип'); }
    $exp = $mimes[$_FILES['photo']['type']];

    //проверим на размер
   $size = $c->getMBytes($_FILES['photo']['size'].'b');
    if($size > 2){
        exit(' привышен размер');
    }

    //передаем картинку
    $img = new SimpleImage($_FILES['photo']['tmp_name']);
    $img->best_fit(320, 200)->save('files/'.time().rand().".".$exp);

    //
    $img->rotate(90)->save('files/'.time().rand().".".$exp);
    $img->flip('x')->save('files/'.time().rand().".".$exp);

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
    <input type="hidden" name="method_name" value="send_one">
    <input type="file" name="photo">

    <input name="submit" type="submit" value="готово"/>
</form>
<script type="text/javascript" src=""></script>
</body>
</html>
