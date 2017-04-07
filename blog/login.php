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
            <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
                <input type="text" name="email" value="" placeholder="email"/><br><br>
                <input type="password" name="pass" value="" placeholder="password"/><br><br>

                <input name="submit" type="submit" value="готово"/>
            </form>
        </section>

    </main>

<script type="text/javascript" src=""></script>
</body>
</html>