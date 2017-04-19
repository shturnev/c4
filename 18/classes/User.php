<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 19.04.2017
 * Time: 18:45
 */


class User
{

    public function __construct()
    {
        $this->U2 = new App\User();
    }

    public function go($str = 'это класс u 0')
    {
        echo $str;
    }

}