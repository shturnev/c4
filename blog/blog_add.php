<? require_once "blocks/autoload.php";

    $U = new User();
    $B = new Blog();


    $admin = $U->is_admin($_COOKIE["user_id"]);
    if(!$admin){ header("Location: index.php"); exit(); }

    //2
    if($_POST["method_name"] == "add")
    {
        try{
            $post_id = $B->add($_POST);
            $url = "blog_in.php?ID=".$post_id;
            header("Location: ".$url); exit;

        }
        catch(Exception $e){
            $error_text = $e->getMessage();
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
    <link rel="stylesheet" type="text/css" media="all" href="styles/app.css"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

    <main>
        <? require "blocks/header.php" ?>


        <? if($error_text){ ?> <div class="forError mt35">  <? echo $error_text ?></div> <? } ?>



        <section id="for-form" class="mt50">
            <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
                <input type="hidden" name="method_name" value="add">

                <input type="text" name="title" value="" placeholder="Заголовок"><br><br>

                <textarea id="text1" name="descr" placeholder="Краткий текст"></textarea><br><br>
                <textarea id="text2" name="text" placeholder="Полный текст"></textarea><br><br>

                <input name="submit" type="submit" value="готово"/>
            </form>
        </section>

    </main>

<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script type="text/javascript" >

    CKEDITOR.replace( 'text1' );
    CKEDITOR.replace( 'text2' );

</script>
</body>
</html>