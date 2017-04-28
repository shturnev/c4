<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 26.04.2017
 * Time: 19:16
 */
class Brand
{

    public function __construct()
    {
        $this->DB = new DB();
        $this->Upload = new Upload();
        $this->Path = new Path();

        //
        $this->output = $this->Path->clear_path()."FILES".DIRECTORY_SEPARATOR."brands".DIRECTORY_SEPARATOR;
    }


    public function add($array)
    {
       $name = Security::shield_1($array["name"]);

       //проверки
       if(!$name){
           throw new \Exception("Name - обязательное поле. Надо заполнить");
       }

       if(!$_FILES["logo"]["tmp_name"])
       {
           throw new \Exception("Логотип - обязательное поле");
       }

       $filename = $this->add_logo("logo");

       //сохранить в базу
       $arr = [
           "name" => $name,
           "logo" => $filename
       ];

       $resAdd = $this->DB->insert("brands", $arr);

       return $resAdd;



    }

    public function edit($array)
    {
       $name = Security::shield_1($array["name"]);
       $id   = $array["ID"];

       //проверки
       if(!$name){
           throw new \Exception("Name - обязательное поле. Надо заполнить");
       }

       if(!is_numeric($id)){
           throw new \Exception("Не корректный id");}

       //Соберём инфо про эту запись
        $sql = "SELECT * FROM brands WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);
        if(!$resItem){
            throw new \Exception("Такой записи не найдено");}

        //работа с  картинкой
        if($_FILES["logo"]["tmp_name"])
        {
            $filename = $this->add_logo("logo");

            if(file_exists($this->output.$resItem["logo"]))
            {
                unlink($this->output.$resItem["logo"]);
            }

        }
        else
        {
            $filename =  $resItem["logo"];
        }




       //сохранить в базу
       $arr = [
           "name" => $name,
           "logo" => $filename
       ];

       $resDB = $this->DB->update("brands", $arr, "ID = ".$id);
       return $resDB;



    }

    public function get_one($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректные данные ID");}

        $sql = "SELECT * FROM brands WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);

        return $resItem;
    }

    /**
     * @param $settings (array) - [limit, page]
     * @return bool
     */
    public function get_few($settings)
    {
        $sql = "SELECT COUNT(*) AS n FROM brands";
        $all_posts = $this->DB->get_row($sql);
        if(!$all_posts["n"]){ return false; }

        $arr = [
            "limit" => (!is_numeric($settings["limit"]))? 30 : $settings["limit"],
            "page"  => $settings["page"],
            "posts" => $all_posts["n"],
        ];

        $resNav = Nav::get_nav($arr);



        $sql = "SELECT * FROM brands ORDER BY nomer ASC LIMIT ".$resNav["start"].",".$resNav["limit"];
        $resItems["items"] = $this->DB->get_rows($sql);
        $resItems["stack"] = $resNav["stack"];

        return $resItems;
    }

    public function delete($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректный ID");}

        //Соберём инфо про эту запись
        $sql = "SELECT * FROM brands WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);
        if(!$resItem){
            throw new \Exception("Такой записи не найдено");}

        //удалим картинку
        if(file_exists($this->output.$resItem["logo"]))
        {
            unlink($this->output.$resItem["logo"]);
        }

        //удалим саму запись
        $this->DB->delete("brands", "ID = ".$id);

        return true;
    }


//PRIVATE----------
    private function add_logo($input_name)
    {
        //загружаем картинку 1 ошибки, 2 тип, 3 размер
        $exp = $this->Upload->check_img($input_name, 2);

        //сохраняем картинку
        $img = new SimpleImage($_FILES[$input_name]["tmp_name"]);
        $filename = time().rand().".".$exp;
        $out_path = $this->output.$filename;
        $img->best_fit(255, 132)->save($out_path);

        return $filename;
    }


}