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
    <h1>Вход</h1>
</div>
<form  class="form-horizontal" role="form">
    <div class="form-group" id="log">
        <label for="inputEmail3" class=" col-lg-4 control-label">Email</label>
        <div class=" col-lg-4">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class=" col-lg-4 control-label">Пароль</label>
        <div class=" col-lg-4">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-4 col-lg-4  col-md-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Запомнить меня
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-4 col-lg-4  ">
            <button type="submit" class="btn btn-default">Войти</button>
        </div>
    </div>
</form>
</body>
</html>
