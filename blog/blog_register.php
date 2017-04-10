<?php

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог Сергея</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>
<body id="bd_log">
<div class="container-fluid text-center">
    <h1>Регистрация</h1>
</div>

<form class="form-horizontal">


    <div class="form-group">
        <label class="control-label col-lg-offset-1 col-lg-3" for="inputEmail">Email:</label>
        <div class="col-lg-4">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-offset-1 col-lg-3" for="inputPassword">Пароль:</label>
        <div class="col-lg-4">
            <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-offset-1  col-lg-3" for="confirmPassword">Подтвердите пароль:</label>
        <div class="col-lg-4">
            <input type="password" class="form-control" id="confirmPassword" placeholder="Введите пароль ещё раз">
        </div>
    </div>




    <br />
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" value="Регистрация">
            <input type="reset" class="btn btn-default" value="Очистить форму">
        </div>
    </div>
</form>
</body>
</html>
