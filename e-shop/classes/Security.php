<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 14.04.2017
 * Time: 18:40
 */
class Security
{

    /**
     * Полный экран
     * @param $string
     * @return string
     */
    public static function shield_1($string)
    {
        $string = trim($string);
        $string = htmlspecialchars($string);
//        $string = str_replace("onclick", 'on click')
//        $string = strip_tags($string); // удаляет html код

        return $string;
    }


    /**
     * Оставим html
     * @param $string
     * @return string
     */
    public static function shield_2($string)
    {
        $string = trim($string);
        $string = addslashes($string);
//        $string = str_replace("onclick", 'on click')
//        $string = strip_tags($string); // удаляет html код

        return $string;
    }


    /**
     * Полный экран + добавим переносы на новую строку
     * @param $string
     * @return string
     */
    public static function shield_3($string)
    {
        $string = trim($string);
        $string = str_replace("<br>", "\n", $string);
        $string = htmlspecialchars($string);
        $string = str_replace("\n", "<br>", $string);
//        $string = str_replace("onclick", 'on click')
//        $string = strip_tags($string); // удаляет html код

        return $string;
    }



}