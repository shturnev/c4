<?php
/**
 * Created by PhpStorm.
 * User: Сергій
 * Date: 08.04.2017
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
    <title>Блог</title>

    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body id="bd">
<div id="belt">
    <header>
        <div class="container-fluid text-center">
                <div class="logo">
                    <h3>
                        Цыбульник Сергей
                    </h3>
                </div>
            <div class="row ">
               <div class="col-lg-4 col-md-4 ">
                   <a href="blog_login.php">
                       <h4 class="nav">
                           Авторизация
                       </h4>
                   </a>
               </div>

                <div class="col-lg-4 col-md-4">
                    <a href="blog_register.php">
                    <h4 class="nav">
                        Регистрация
                    </h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="">
                        <h4 class="nav">
                            Выход
                        </h4>
                    </a>
                </div>
           </div>
        </div>
    </header>

    <div id="ad" class="container-fluid text-center">
        <a href="" class="add">
            <h3>
                Добавить
            </h3>
        </a>
    </div>
    <div class="container-fluid text-center">
        <div class="row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8">
            <?php for($i=0; $i<10; $i++){?>
                <div class="article">
                    <a href="blog_in.php" class="title"><h1 id="art">Заглавие</h1></a>
                    <div class="text">
                        <h4> Lorem ipsum dolor sit amet.</h4>

                    </div>
                    <a href="#" class="edit">редактировать</a>
                    <a href="#" class="delete">удалить</a>
                </div>
            <?}?>
        </div>
    </div>


</body>
</html>
