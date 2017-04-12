<?php

/**
 * Project c4.
 * User: pc_b
 * Date: 10.04.2017
 * Time: 18:56
 */
class Enter
{

    public function __construct()
    {
        $this->DB = new DB();
    }


    public function register($array)
    {
        $email = filter_var( $array['email'], FILTER_VALIDATE_EMAIL);
        $pass = (trim($array['pass']))? password_hash($array['pass'], PASSWORD_DEFAULT) : null;


    //проверки
    if(!$email){
        throw new \ Exception( 'Не корректный email');}

    if(!$pass){
        throw new \ Exception( 'пароль не может быть пустым');}


        //выборка такого пользователя

        $sql = "SELECT * FROM users WHERE email = '".$email."' AND pass = '".$pass."'";
        $resItem = $this->DB->get_row($sql);
        
        if($resItem){
            throw new \Exception('Такой пользователь уже существует');}

            //создаем новую запись

            $arr = [
            'email' => $email,
            'pass' => $pass,
            'token' =>hash('md5', time().rand()),
            'date' => time()
            ];

            $resInsert = $this->DB->insert('users', $arr);

        //отправляем на почту
        $text = "http://c4/blog/register.php?verify=1&token=".$arr['token'];
        if (!mail($email, 'подтвердить регистрацию', $text));
        {
            throw new \Exception('Ошибка при отправки письма');
        }
            //отклик
        return $resInsert;
    }


    
    public function verify_email($token)
    {
        $token = addslashes($token);
        
        //выборка такого пользователя
        $sql = "SELECT * FROM users WHERE token = '".$token."' AND verify = 0";
        $resItem = $this->DB->get_row($sql);
        
        if (!$resItem){
            throw new \Exception('сори,такой записи нет');
        }
         
        //верефицируем
        $this->DB->update('users', ['verify' => 1, 'date' => time()], 'ID ='.$resItem['ID']);
        
        //response
        return true;
    }
    
}