<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>blog_julia</title>
    <link rel="stylesheet" href="css/style_blog.css">
</head>
<body>
<div class="main">

    <div class="button">
        <a class="button" href="">Добавить</a>
    </div>
    <? require "blocks/header.php"?>

    <ul>
        <? for($i=0; $i<10;$i++){?>
        <li>
            <a href="blog_in.php">Lorem ipsum.</a>
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
        <li>
            <a href="blog_in.php">Est, quas.</a>
            <div class="descr">Atque explicabo minus neque quas quis vero! Non quia, voluptate! Assumenda,
                exercitationem facilis illum incidunt ipsam itaque magni omnis porro reiciendis suscipit. Blanditiis
                consequatur culpa dolore officiis voluptatum? Natus, quae.
            </div>
            <br>
            <div class="btns">
                <a href="#">редактировать</a>
                <a href="#">удалить</a>
                <br><br>
            </div>
        </li>
        <li>
            <a href="blog_in.php">Rerum, temporibus?</a>
            <div class="descr">A accusamus amet dicta distinctio eaque ex exercitationem illum ipsa iusto labore, nam
                quisquam tempora tempore vitae voluptate, voluptatem voluptates. Deleniti doloremque doloribus inventore
                ipsa molestias nam non provident quod.
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