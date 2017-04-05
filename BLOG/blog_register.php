<!doctype html>
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

    <section class="registr">
        <h1>Регистрация</h1>
        <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
            <input type="text" name="email" value="" placeholder="email"/><br><br>
            <input type="text" name="pass" value="" placeholder="pass"/><br><br>


            <input name="submit" type="submit" value="готово"/>
        </form>

    </section>
</div>

</body>
</html>