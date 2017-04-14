<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 14.04.2017
 * Time: 18:34
 */
class Blog
{

    public function __construct()
    {
        $this->DB = new DB();
    }


    public function add($array)
    {
        $title = Security::shield_1($array["title"]);
        $descr = addslashes($array["descr"]);
        $text  = addslashes($array["text"]);


        if(!$title){
            throw new \Exception("Заголовок не может быть пустым");}


        //пишем в базу
        $arr = [
            "title"     => $title,
            "descr"     => $descr,
            "text"      => $text,
            "date"      => time(),
            "user_id"   => $_COOKIE["user_id"]
        ];

        $resInsert = $this->DB->insert("blog", $arr);

        return $resInsert;

    }

    public function edit($array)
    {
        $title = Security::shield_1($array["title"]);
        $descr = addslashes($array["descr"]);
        $text  = addslashes($array["text"]);
        $ID    = $array["ID"];

        if(!$title){
            throw new \Exception("Заголовок не может быть пустым");}

        if(!is_numeric($ID)){
            throw new \Exception("Не корректный ID");}

        //делаем выборку
        $sql = "SELECT * FROM blog WHERE ID = ".$ID;
        $resItem = $this->DB->get_row($sql);
        if(!$resItem){
            throw new \Exception("Такой записи нет");}


        //пишем в базу
        $arr = [
            "title"     => $title,
            "descr"     => $descr,
            "text"      => $text,
            "date"      => time(),
        ];

        $this->DB->update("blog", $arr, "ID = ".$ID);

        return true;
    }

    public function delete($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректный ID");}

        $this->DB->delete("blog", "ID = ".$id);

        return true;
    }

    public function get_one($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректные данные ID");}

        $sql = "SELECT * FROM blog WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);

        return $resItem;
    }

    public function get_few($settings)
    {
        $sql = "SELECT COUNT(*) AS n FROM blog";
        $all_posts = $this->DB->get_row($sql);
        if(!$all_posts["n"]){ return false; }

        $arr = [
            "limit" => (!is_numeric($settings["limit"]))? 30 : $settings["limit"],
            "page"  => $settings["page"],
            "posts" => $all_posts["n"],
        ];

        $resNav = Nav::get_nav($arr);



        $sql = "SELECT * FROM blog ORDER BY ID DESC LIMIT ".$resNav["start"].",".$resNav["limit"];
        $resItems["items"] = $this->DB->get_rows($sql);
        $resItems["stack"] = $resNav["stack"];

        return $resItems;
    }

}