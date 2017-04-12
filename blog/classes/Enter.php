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
        //(условие)? true : false ;

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
            "email" => strtolower($email),
            "pass"  => $pass,
            "token" => hash('md5', time().rand()),
            "date"  => time(),
        ];


        $resInsert = $this->DB->insert("users", $arr);

        //Отправим на почту
        $text = "http://c4/blog/register.php?verify=1&token=".$arr["token"];
        if(!mail($email, "Подтвердить регу", $text ))
        {
            throw new \Exception("Ошибка при отправки письма");
        }

        //response
        return $resInsert;


    }

    public function verify_email($token)
    {
        $token = addslashes($token); //XSS атаки

        //Сделаем выборку такого пользователя
        $sql = "SELECT * FROM users WHERE token = '".$token."' AND verify = 0";
        $resItem = $this->DB->get_row($sql);

        if(!$resItem){
            throw new \Exception("Сорри, такой записи нет");}

        //Верифицируем
        $this->DB->update("users", ["verify" => 1, "date" => time()], "ID = ".$resItem["ID"]);

        //авторизуем
        $this->set_coockie($resItem);

        //response
        return true;

    }


    public function login($array)
    {
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        $email = strtolower($email);

        //проверки
        if(!$email){
            throw new \Exception("Не корректный email"); }

        if(!trim($array["pass"])){
            throw new \Exception("Пароль не может быть пустым");}

        //Делаем выборку по этому email
        $sql = "SELECT * FROM users WHERE email = '".$email."' AND verify = 1";
        $resItem = $this->DB->get_row($sql);

        if(!$resItem){
            throw new \Exception("Такого пользователя не найдено");}

        if(!password_verify($array["pass"], $resItem["pass"])){
            throw new \Exception("Не верный пароль");
        }

        //Создаем куки
        $this->set_coockie($resItem);

        return $resItem;

    }


    public function validate_coockie()
    {
        $user_id  = $_COOKIE["user_id"];
        $token    = $_COOKIE["token"];

        if(!is_numeric($user_id) or !$token){ return false; }

        //делаем выборку
        $sql = "SELECT * FROM users WHERE ID= ".$user_id." AND verify = 1";
        $resItem = $this->DB->get_row($sql);
        if(!$resItem){return false;}

        //совпадают ли токен
        if($token != $resItem["token"]){ return false; }

        //response
        return true;

    }


    public function logout()
    {
        $arr = [
            "ID"    => $_COOKIE["user_id"],
            "token" => $_COOKIE["token"]
        ];
        $this->set_coockie($arr, false);
    }



///Dop
    private function set_coockie($resItem, $checker = true)
    {

        $time = ($checker)? strtotime("+1 month") : strtotime("-1 month");

        setcookie('user_id', $resItem["ID"],$time, "/blog");
        setcookie('token', $resItem["token"], $time, "/blog");
    }
}
