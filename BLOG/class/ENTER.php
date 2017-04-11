<?php

/**
 * Created by PhpStorm.
 * User: Сергій
 * Date: 11.04.2017
 * Time: 22:18
 */
class ENTER
{
    public function __construct()
    {
        $this->DB = new DB();
    }
    //регистрация
    public function register($array)
    {
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        $pass = (trim($array["pass"]))?password_hash($array["pass"],PASSWORD_DEFAULT) : null ;

        //проверки
        if(!$email){
            throw new \Exception("Не корректный адрес");
        }
        if(!$pass){
            throw new \Exception("Пароль не может быть пустым");
        }

        //выборка пользователя
        $sql = "SELECT * FROM users WHERE email = '".$email."' AND pass = '".$pass"'";
        $resItem = $this->DB->get_row($sql);

        if($resItem){
            throw new \Exception("Такой пользователь уже зарегистрирован");
        }

        //Создание новой записи
        $arr = [
            "email" => $email,
            "pass" => $pass,
            "token" => hash('md5', time().rand()),
            "date" => time(),
        ];
        $resInsert = $this->DB->insert("users", $arr);

        //Отправить на почту
        $text = "http://c4/BLOG/blog_register.php?verify=1&token=".$arr["token"];
        if (!mail($email, "Подтвердить регистрацию", $text)){
            throw new \Exception("Ошибка при отправке письма");
        }

        //Ответ
        return $resInsert;
    }

    public function verify_email($token)
    {
        $token = addcslashes($token);

        //Выборка пользователя
        $sql = "SELECT * FROM users WHERE token = '".$token."' AND verify = 0";
        $resItem = $this->DB->get_row($sql);

        if($resItem){
            throw new \Exception("Извените, такого пользователя нет");
        }

        //Верификация
        $this->DB->update("users", ["verify" =>1, "date" => time()], "ID = ".$resItem["ID"]);

        //Ответ
        return true;
    }

}