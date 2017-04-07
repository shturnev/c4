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
        <div class="add-blog">
            <a href="#">+</a>
        </div>
        <ul >
            <? for ($i = 0; $i < 10; $i++): ?>

                <li>
                <a href="blog_in.php" class="for-title">Lorem ipsum dolor.</a>
                <div class="descr">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum iusto obcaecati
                    omnis
                    recusandae ullam! Consequatur delectus eum hic, laboriosam quaerat tempora vero voluptatum. Earum
                    itaque
                    nulla odio. Deserunt, ipsa sit.
                </div>
                <div class="btns">
                    <a href="#">Редактировать</a>
                    <a href="#">Удалить</a>
                </div>
            </li>

            <? endfor; ?>

        </ul>
    </section>
</main>


<script type="text/javascript" src=""></script>
</body>
</html>

