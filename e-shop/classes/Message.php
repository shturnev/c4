<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 19.05.2017
 * Time: 19:04
 */
class Message
{

    public function __construct()
    {
        $this->DB = new DB();
    }


    public function add($array)//set сеттеры
    {
        $name  = Security::shield_1($array["name"]);
        $email = filter_var($array["email"], FILTER_VALIDATE_EMAIL);
        $subject = Security::shield_1($array["subject"]);
        $text  = Security::shield_1($array["text"]);

        //проверки
        if(!$email){
            throw new \Exception("Не корректный email");}

        if(!$text){
            throw new \Exception("Текст не может быть пустым");}

        //проверим каптчу
        $google = [
            "secret" => "6LcFKCIUAAAAACOx2dHH0wZs3Gufa66GG_rbjCgK",
            "response" => $array["g-recaptcha-response"],
            "remoteip" => $_SERVER["REMOTE_ADDR"]
        ];

        $resCurl = Curl::sendCurl("https://www.google.com/recaptcha/api/siteverify", "POST", $google);
        if(!$resCurl["success"])
        {
            throw new \Exception("Ошибка при заполнении каптчи: ".$resCurl["error-codes"][0] );}




        //пишем в базу
        $arr = [
            "name" => $name,
            "email" => $email,
            "subject" => $subject,
            "text" => $text,
            "ip" => $_SERVER["REMOTE_ADDR"],
            "date" => time(),
        ];

        $resDb = $this->DB->insert("messages", $arr);

        return $resDb;
    }

    public function get_one($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректные данные ID");}

        $sql = "SELECT * FROM messages WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);

        if($resItem)
        {
            $this->set_status(1, $id);
        }

        return $resItem;
    }

    /**
     * @param $settings (array) - [limit, page]
     * @return bool
     */
    public function get_few($settings)
    {
        $status = (is_numeric($settings["status"]))? $settings["status"] : null;

        if($status){
            $dop_sql = " WHERE status = ".$status;
        }


        $sql = "SELECT COUNT(*) AS n FROM messages".$dop_sql;
        $all_posts = $this->DB->get_row($sql);
        if(!$all_posts["n"]){ return false; }

        $arr = [
            "limit" => (!is_numeric($settings["limit"]))? 30 : $settings["limit"],
            "page"  => $settings["page"],
            "posts" => $all_posts["n"],
        ];

        $resNav = Nav::get_nav($arr);



        $sql = "SELECT * FROM messages".$dop_sql." ORDER BY ID DESC LIMIT ".$resNav["start"].",".$resNav["limit"];
        $resItems["items"] = $this->DB->get_rows($sql);
        $resItems["stack"] = $resNav["stack"];

        return $resItems;
    }

    public function delete($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректный ID");}

        //Соберём инфо про эту запись
        $sql = "SELECT * FROM messages WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);
        if(!$resItem){
            throw new \Exception("Такой записи не найдено");}

        //удалим саму запись
        $this->DB->delete("messages", "ID = ".$id);

        return true;
    }


    public function set_status($status = 1, $id)
    {
        $this->DB->update("messages", ["status" => $status], "ID = ".$id);
    }


}