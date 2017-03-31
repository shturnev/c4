<?php

//$_COOCKIE

//setcookie('nickname', 'sht', strtotime('+1 hour'), '/' );
$_COOKIE["yyyy"] = 43434;
setcookie('nickname', 'sht', strtotime("-1 hour"));


$nickname = $_COOKIE;
unset($nickname, $_COOKIE); //удаление переменных


$_COOKIE['nickname'] = 'gggggg';
$gfgfg = 2;

?>

