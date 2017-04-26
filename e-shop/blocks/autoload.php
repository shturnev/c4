<?php


function my_autoload($classname)
{
    $classname = ltrim($classname, '\\');
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $classname).".php";

    $here  = strstr(__DIR__, DIRECTORY_SEPARATOR.'e-shop', true);
    $here .= DIRECTORY_SEPARATOR."e-shop".DIRECTORY_SEPARATOR;

    require_once $here."classes".DIRECTORY_SEPARATOR.$path;
}

spl_autoload_register('my_autoload');
