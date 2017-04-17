<?
require_once "functions/autoload.php";

$Up   = new Upload;
$Conv = new ByteConverter();

    if($_POST["method_name"] == "send_file" && $_FILES["fff"]["name"])
    {

        /*try{
            //1 есть ли ошибка
            Upload::checkError($_FILES["fff"]["error"]);

            //2 тип файла
            Upload::check_mime($_FILES["fff"]["type"], "zip");

            //3 размер файла
            $size = $Conv->getMBytes($_FILES["fff"]["size"]."b");
            if($size > 10){
                throw new \Exception("Превышен размер файла");
            }

            //4 сохранить файл
            $path = "FILES".DIRECTORY_SEPARATOR."zip";
            $filename = time().rand().".zip";

            $resCopy = copy($_FILES["fff"]["tmp_name"], $path.DIRECTORY_SEPARATOR.$filename);
            if(!$resCopy){
                throw new \Exception("Ошибка при копировании файла");
            }


        }*/
        try{
            //1 есть ли ошибка
            Upload::checkError($_FILES["fff"]["error"]);

            //2 тип файла
            $exp =  Upload::check_mime($_FILES["fff"]["type"], "image");

            //3 размер файла
            $size = $Conv->getMBytes($_FILES["fff"]["size"]."b");
            if($size > 10){
                throw new \Exception("Превышен размер файла");
            }


            //4 работаем над изобрадением
            $img = new SimpleImage($_FILES["fff"]["tmp_name"]);//http://cvcvcvcvcvc/ddfd.jpg

            $output     = "FILES/avatar/";
            $filename   = time().rand().".".$exp;
            $img->best_fit(500, 500)->save($output."big/".$filename);
            $img->best_fit(100, 100)->save($output."small/".$filename);

            //4 изменить размер картинки, положить куда надо



        }
        catch(Exception $e){
            $error_text = $e->getMessage();
        }

        //2 тип файла
        //3 размер файла

        if($error_text){ exit($error_text); }

    }


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="style/style.css"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>


<div class="forForm">
    <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
        <input type="hidden" name="method_name" value="send_file">

        <input type="file" name="fff"  />

        <input name="submit" type="submit" value="готово"/>
    </form>
</div>


<script type="text/javascript" src=""></script>
</body>
</html>