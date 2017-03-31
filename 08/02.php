<?php
//include "User1.php";  //
//require "User1.php";
require_once "User.php";

$user = new User(555);
echo $user->run(105);
echo "<br>";
echo User::move(5);



?>

