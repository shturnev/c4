<?
    require_once "blocks/autoload.php";

    $U = new User();
    $B = new Blog();

    $admin = $U->is_admin($_COOKIE["user_id"]);


    /*-----------------------------------
    Соберём все записи
    -----------------------------------*/
    $blogItems = $B->get_few(["limit" => 5, "page" => $_GET["page"]]);
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

    <section id="blog-list">

        <? require "blocks/plus_btn.php" ?>

        <ul >
            <? foreach ($blogItems["items"] as $item):?>

                <li>
                <a href="blog_in.php?ID=<? echo $item["ID"] ?>" class="for-title"><? echo $item["title"] ?></a>
                <div class="descr">
                    <? echo $item["descr"] ?>
                </div>

                <? if($admin){ ?>
                    <div class="btns">
                        <a href="blog_edit.php?ID=<? echo $item["ID"] ?>">Редактировать</a>
                        <a data-js="delete" href="options.php?method_name=del_blog&ID=<? echo $item["ID"] ?>">Удалить</a>
                    </div>
                <? } ?>
            </li>

            <? endforeach; ?>




        </ul>

        <? if($blogItems["stack"]){ ?>
        <div class="postrNav">
            постраничная нав
        </div>
        <? } ?>


        <div class="h100"></div>

    </section>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/common.js"></script>
</body>
</html>

