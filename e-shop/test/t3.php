<?php
require "../blocks/autoload.php";

$B = new Basket();

$res = $B->get_few(["user_id" => $_COOKIE["user_id"]]);
