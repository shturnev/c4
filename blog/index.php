<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>blog_nikolay</title>
    <link rel="stylesheet" href="css/style_start.css">
</head>
<body>
<div class="main">
    <?php require 'blocks/header.php' ?>
    <div class="button">
        <a class="button" href="blog_add.php">Добавить</a>
    </div>


    <ul>
        <? for ($i = 0; $i < 40; $i++) { ?>
            <li>
                <a href="blog_in.php">Lorem ipsum.</a>
                <div class="descr">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur corporis earum
                    inventore laudantium pariatur qui totam vero? Consectetur dolorem eius illo libero minima nesciunt
                    nisi
                    odio, officia perferendis repellendus similique?
                </div>
                <div class="adm_btns">
                    <a href="#">Редактировать</a>
                    <a href="#">Удалить</a>
                </div>
            </li>
        <? } ?>
    </ul>


</div>


</body>
</html>