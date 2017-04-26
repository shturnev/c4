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

       //загружаем картинку 1 ошибки, 2 тип, 3 размер
       $exp = $this->Upload->check_img("logo", 2);

       //сохраняем картинку
       $img = new SimpleImage($_FILES["logo"]["tmp_name"]);
       $filename = time().rand().".".$exp;
       $out_path = $this->Path->clear_path()."FILES".DIRECTORY_SEPARATOR."brands".DIRECTORY_SEPARATOR.$filename;
       $img->best_fit(255, 132)->save($out_path);

       //сохранить в базу
       $arr = [
           "name" => $name,
           "logo" => $filename
       ];

       $resAdd = $this->DB->insert("brands", $arr);

       return $resAdd;



    }




}