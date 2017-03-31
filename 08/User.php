<?php

/**
 * Class User
 */
class User{
    public $nickname = "сергей"; //private, public, static, abstract, protected
    private $pass1;

    public function __construct($pass2)
    {
        //тут мы проверим $pass
        $this->pass1 = $pass2;


    }


    /**
     * Это метод который бла бла
     * @param int $km - кол-во <b>киллометров</b><a href='dsdsdsd'>sdsdsdsds</a>
     * @return string
     */
    public function run($km = 0){

        $result = $this->nickname . " пробежал " . $km . "км";

        return $result;

    }

    public static function move($km){
        $result = "некто пробежал " . $km . "км";

        return $result;

    }

}


