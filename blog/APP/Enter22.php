<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 07.04.2017
 * Time: 18:54
 */
class Enter
{

    public function __construct()
    {
        $this->DB = new DB();
    }

    /**
     * Регистрация
     * @param $array
     * @return mixed
     * @throws Exception
     */
    public function register($array)
    {
        $email =  filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        $pass  =  (trim($array["pass"]))? password_hash($array["pass"],PASSWORD_DEFAULT) : null ;

        //проверки
        if(!$email){
            throw new \Exception("Не корректный email"); }

        if(!$pass){
            throw new \Exception("Пароль не может быть пустым");}


        //Сделаем выборку такого пользователя
        $sql = "SELECT * FROM users WHERE email = '".$email."' AND pass = '".$pass."'";
        $resItem = $this->DB->get_row($sql);

        if($resItem){
            throw new \Exception("Сорри, такой пользователь уже есть");}

        //Создадии новую запись
        $arr = [
            "email" => $email,
            "pass"  => $pass,
            "token" => hash('md5', time().rand()),
            "date"  => time(),
        ];


        $resInsert = $this->DB->insert("users", $arr);

        //Отправим на почту
        $text = "http://c4/blog/register.php?verify=1&token=".$arr["token"];
        if(!mail($email, "Подтвердить регу", $text ))
        {
            throw new \Exception("Ошибка при отпрвки письма");
        }

        //response
        return $resInsert;


    }

    public function verify_email($token)
    {
        $token = addslashes($token);

        //Сделаем выборку такого пользователя
        $sql = "SELECT * FROM users WHERE token = '".$token."' AND verify = 0";
        $resItem = $this->DB->get_row($sql);

        if(!$resItem){
            throw new \Exception("Сорри, такой записи нет");}

        //Верифицируем
        $this->DB->update("users", ["verify" => 1, "date" => time()], "ID = ".$resItem["ID"]);

        //response
        return true;

    }
}