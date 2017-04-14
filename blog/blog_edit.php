<? require_once "blocks/autoload.php";


    $U = new User();
    $B = new Blog();

/*-----------------------------------
проверки
-----------------------------------*/
    $admin = $U->is_admin($_COOKIE["user_id"]);
    if(!$admin){ header("Location: index.php"); exit(); }

    if(!is_numeric($_GET["ID"])){
        header("Location: index.php"); exit;
    }


/*-----------------------------------
Если была отправлена форма
-----------------------------------*/
    if($_POST["method_name"] == "edit")
    {
        try{
            $B->edit($_POST);
            $url = "blog_in.php?ID=".$_GET["ID"];
            header("Location: ".$url); exit;

        }
        catch(Exception $e){
            $error_text = $e->getMessage();
        }
    }

/*-----------------------------------
Вытащим данные про запись
-----------------------------------*/
    try {
        $item_info = $B->get_one($_GET["ID"]);
    } catch (Exception $e) {
        exit($e->getMessage());
    }




?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Редактировать запись: <? echo $item_info["title"] ?></title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="styles/app.css"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

    <main>
        <? require "blocks/header.php" ?>

        <section id="for-form" class="mt50">
            <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
                <input type="hidden" name="method_name" value="edit">
                <input type="hidden" name="ID" value="<? echo $item_info["ID"] ?>">

                <input type="text" name="title" value="<? echo $item_info["title"] ?>" placeholder="Заголовок"><br><br>

                <textarea id="text1" name="descr" placeholder="Краткий текст"><? echo $item_info["descr"] ?></textarea><br><br>
                <textarea id="text2" name="text" placeholder="Полный текст"><? echo $item_info["text"] ?></textarea><br><br>

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