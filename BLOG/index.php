<?php
/**
 * Created by PhpStorm.
 * User: Сергій
 * Date: 04.04.2017
 * Time: 20:35
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог Сергея</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="belt">
    <?php
    require "boks/heder.php"
    ?>

    <section class="content">
        <a href="" class="add">добавить</a>

        <div class="article">
            <a href="blog_in.php" class="title"><h1>Заглавие</h1></a>
            <div class="text">
                Lorem ipsum dolor sit amet.
            </div>
            <a href="#" class="edit">редактировать</a>
            <a href="#" class="delete">удалить</a>
        </div>

        <div class="article">
            <a href="" class="title"><h1>Заглавие</h1></a>
            <div class="text">
                Lorem ipsum dolor sit amet.
            </div>
            <a href="#" class="edit">редактировать</a>
            <a href="#" class="delete">удалить</a>
        </div>

    </section>
</div>
</body>
</html>