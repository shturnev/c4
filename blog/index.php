<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>blog_julia</title>
    <link rel="stylesheet" href="css/style_blog.css">
</head>
<body>
<div class="main">
    <? require "blocks/header.php"?>


    <div class="button">
        <a href="">Добавить</a>
    </div>


    <ul class="blog-list">
        <? for($i=0; $i<10;$i++){?>
        <li>
            <a class="for-title" href="blog_in.php">Lorem ipsum.</a>
            <div class="descr">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam assumenda
                consectetur doloribus et facilis illo magnam molestiae, quasi quisquam quod soluta voluptatibus?
                Aspernatur, deserunt explicabo magnam magni quidem sunt.
            </div>
            <br>
            <div class="btns">
                <a href="#">редактировать</a>
                <a href="#">удалить</a>
                <br><br>
            </div>
        </li>
        <?}?>
    </ul>


</div>



</body>
</html>