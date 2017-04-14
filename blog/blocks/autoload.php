<?php


function my_autoload($classname){

    $path = "classes".DIRECTORY_SEPARATOR.$classname.".php";
    require_once $path;

}

spl_autoload_register('my_autoload');
