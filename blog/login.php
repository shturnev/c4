<?
require_once "classes/DB.php";
require_once "classes/Enter.php";

$E = new Enter();

//Регистриция
if($_POST["method_name"] == "login")
{
    try{
        $E->login($_POST);
        header("Location: index.php");
        exit;

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

        <section id="for-form" class="mt50">

            <? if($error_text){ ?>
                <div class="forError mt50 mb50"><? echo $error_text ?></div>
            <? } ?>

            <? if($success_text){ ?>
                <div class="forError mt50 mb50"><? echo $success_text ?></div>
            <? } ?>


            <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
                <input type="hidden" name="method_name" value="login">

                <input type="text" name="email" value="" placeholder="email"/><br><br>
                <input type="password" name="pass" value="" placeholder="password"/><br><br>

                <input name="submit" type="submit" value="готово"/>
            </form>
        </section>

    </main>

<script type="text/javascript" src=""></script>
</body>
</html>