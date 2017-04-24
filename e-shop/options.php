<?php
require_once "blocks/autoload.php";


//Регистриция
if($_POST["method_name"] == "register")
{
    $E = new Enter();

    try{
        $E->register($_POST);
        exit("Спасибо за регистрацию, проверьте свою почту");
    }
    catch(Exception $e){
        $error_text = $e->getMessage();
        exit( $error_text );
    }

}

//Авторизация
if($_POST["method_name"] == "login")
{
    $E = new Enter();

    try{
        $E->login($_POST);
        header("Location: /e-shop");

    }
    catch(Exception $e){
        $error_text = $e->getMessage();
        exit( $error_text );
    }

}


//Верификация
if($_GET["verify"] and $_GET["token"])
{
    $E = new Enter();

    try{
        $E->verify_email($_GET["token"]);
//        $success_text = "Спасибо, ваш email верифицирован";
        exit("Спасибо, ваш email верифицирован");

    }
    catch(Exception $e){
        $error_text = $e->getMessage();
        exit( $error_text );
    }
}

//Выход
if($_GET["method_name"] == "logout")
{
    $E = new Enter();
    $E->logout();

    header("Location: /e-shop");
    exit();
}

