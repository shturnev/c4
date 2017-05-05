<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 05.05.2017
 * Time: 19:27
 */
class Gallery
{

    public function __construct()
    {
        $this->DB = new DB();
        $this->Upload = new Upload();
        $this->Path = new Path();

        $this->output = $this->Path->clear_path()."FILES".DIRECTORY_SEPARATOR."gallery".DIRECTORY_SEPARATOR;

    }

    public function add($array)
    {
        $table_name = Security::shield_1($array["table_name"]);
        $table_id   = $array["table_id"];
        $input_name = (!$array["input_name"])? "photo" : $array["input_name"];

        //проверки
        if(!$table_name){
            throw new \Exception("table_name - обязательный параметр");}

        if(!is_numeric($table_id)){
            throw new \Exception("Не корректный table_id");}


        if(!$_FILES[$input_name]){ return false; }





    }




//PRIVATE----------

//TODO продолжить работу над мультизагрузкой (переписать c учетом возможности выбора нескольких файлов)

    private function add_item($FILE)
    {
        //загружаем картинку 1 ошибки, 2 тип, 3 размер
        $exp = $this->Upload->check_img($input_name, 2);

        //сохраняем картинку
        $img = new SimpleImage($FILE["tmp_name"]);
        $filename = time().rand().".".$exp;
        $out_path = $this->output.$filename;
        $img->best_fit(255, 132)->save($out_path);

        return $filename;
    }


}