<?php


function my_autoload($classname)
{
    $classname = ltrim($classname, '\\');
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $classname).".php";

    require_once "classes".DIRECTORY_SEPARATOR.$path;
}

spl_autoload_register('my_autoload');
