<?php

$ffff = "111, 2, 333 ,";
$ffff = explode(",", preg_replace("/[^0-9,]/", "", $ffff));
$ffff = array_filter($ffff);
$t = 1;