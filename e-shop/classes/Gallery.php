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

    /**
     * @param $array - [table_name, table_id, ~input_name]
     * @return bool
     * @throws Exception
     */
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

        //работаем над файлами
        $resUplouads = $this->add_items($input_name);


        //пишем в таблицу
        if($resUplouads)
        {
            foreach ($resUplouads as $item):
                $arrForDb[] = [
                    "name"          => $item["filename"],
                    "table_name"    => $table_name,
                    "table_id"      => $table_id,
                ];
            endforeach;

            $this->DB->multi_duplicate_update("gallery", $arrForDb);
        }


        return $resUplouads;
    }

    public function get($array)
    {
        $table_name = Security::shield_1($array["table_name"]);
        $table_id   = $array["table_id"];

        //проверки
        if(!$table_name){
            throw new \Exception("table_name - обязательный параметр");}
        if(!is_numeric($table_id)){
            throw new \Exception("Не корректный table_id");}

        //собираем данные из таблицы
        $sql = "SELECT * FROM gallery WHERE table_name = '".$table_name."' AND table_id = ".$table_id;
        $resItems = $this->DB->get_rows($sql);

        return $resItems;
    }

    public function delete_one($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректный id");}


        //делаем выборку
        $sql = "SELECT * FROM gallery WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);

        if(!$resItem){ return false; }

        //удалим запись
        $this->DB->delete("gallery", "ID = ".$id);

        //Удалим саму картинку
        $DS = DIRECTORY_SEPARATOR;
        $small = $this->output.$DS."small".$DS.$resItem["name"];
        $big   = $this->output.$DS."big".$DS.$resItem["name"];

        if(file_exists($small)){ unlink($small); }
        if(file_exists($big)){ unlink($big); }

        return true;

    }




//PRIVATE----------

//TODO продолжить работу над мультизагрузкой (переписать c учетом возможности выбора нескольких файлов)

    private function add_items($input_name)
    {
        //загружаем картинку 1 ошибки, 2 тип, 3 размер
        $resArr = [];
        foreach ($_FILES[$input_name]["name"] as $key => $val) {


            $resArr[$key]["exp"] = $this->Upload->check_multi_img($input_name, $key, 2);

            //сохраняем картинку
            $img = new SimpleImage($_FILES[$input_name]["tmp_name"][$key]);
            $filename = time().rand().".".$resArr[$key]["exp"];
            $out_path = $this->output;
            $img->best_fit(800, 600)->save($out_path.DIRECTORY_SEPARATOR."big".DIRECTORY_SEPARATOR.$filename);
            $img->best_fit(300, 300)->save($out_path.DIRECTORY_SEPARATOR."small".DIRECTORY_SEPARATOR.$filename);

            $resArr[$key]["filename"] = $filename;


        }

        return $resArr;

    }


}