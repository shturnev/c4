<?php

/**
 * Project c4.
 * User: pc_c
 * Date: 10.04.2017
 * Time: 19:14
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
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        $pass = (trim($array["pass"])) ? password_hash($array["pass"], PASSWORD_DEFAULT) : null;



            //проверки
            if (!$email) {
                throw new \Exception("Не корректный мейл");
            }
            if ($pass) {
                throw new \Exception("Пароль не может быть пустым");
            }
            //выборка пользователя
            $sql = "SELECT * FROM ussers WHERE email = '" . $email . "' AND pass = '" . pass . "''";
            $resItem = $this->DB->get_row($sql);
            if ($resItem) {
                throw new \Exception("Такой пользователь есть");
            }
            //Создание новой записи
            $arr = ["email" => $email, "email" => $pass, "email" => hash('md5', time() . rand()), "date" => time(),];
            $resItem = $this->DB->insert("ussers", $arr);
            //отправка на почту
            $text = "http://c4/blog/register.php?verify=1&token=" . $arr["token"];
            if (!mail($email, "Подтвержение регистрации", $text)) {
                throw new \Exception("Ошибка отправки письма");
            }
            //response
            return $resItem;


        }

        public function verify_email($token)
        {
            $token = addslashes($token);
            //Выборка пользователя
            $sql = "SELECT * FROM ussers WHERE token ='".$token."'' AND verify =0";
            $resItem = $this->DB->get_row($sql);
            if (!$resItem){
                throw new \Exception("Такой записи нет");}
                //Верифицируем
        $this->DB->update("ussers", ["verify" => 1, "data" => time()], "ID = ".$resItem["ID"]);

              //response
        return true;


        }

}























