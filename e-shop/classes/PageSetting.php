<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 17.05.2017
 * Time: 18:24
 */
class PageSetting
{

    public function __construct()
    {
        $this->DB = new DB(); //Dependency Injection
        $this->GetObj = new PageSettingGet();
        $this->Path = new Path();
        $this->Upload = new Upload();
        
        $DS = DIRECTORY_SEPARATOR;
        
        $this->output = $this->Path->clear_path()."FILES".$DS."pages".$DS;

    }


    public function get($array)
    {
        return $this->GetObj->get($array);
        
    }


    public function edit($array)
    {
        $stranica = Security::shield_1($array["stranica"]);
        if(!$stranica){
            throw new \Exception("Отсутсвует параметр stranica");}

        $title          = Security::shield_1($array["title"]);
        $meta_title     = Security::shield_1($array["meta_title"]);
        $meta_key       = Security::shield_1($array["meta_key"]);
        $meta_descr     = Security::shield_1($array["meta_descr"]);
        $btn_title      = Security::shield_1($array["btn_title"]);
        $text           = Security::shield_2($array["text"]);
        
        $other_info     = json_encode($array["other_info"]);
        
        //Узнаем есть ли уже такая запись
        $sql = "SELECT * FROM page_settings WHERE stranica = '".$stranica."'";
        $resItem = $this->DB->get_row($sql);
        
        
        if($_FILES["photo"]["tmp_name"])
        {
            $photo_name = $this->add_photo("photo");

            if($resItem["photo"])
            {
                $DS = DIRECTORY_SEPARATOR;
                if(file_exists($this->output."big".$DS.$resItem["photo"]))
                {
                    unlink($this->output."big".$DS.$resItem["photo"]);
                }
                if(file_exists($this->output."small".$DS.$resItem["photo"]))
                {
                    unlink($this->output."small".$DS.$resItem["photo"]);
                }
            }
        }


        //Пишем новые данные в таблицу
        $arr = [
            "stranica"      => $stranica,
            "title"         => $title,
            "meta_title"    => $meta_title,
            "meta_key"      => $meta_key,
            "meta_descr"    => $meta_descr,
            "btn_title"     => $btn_title,
            "photo"         => ($photo_name)? $photo_name : $resItem["photo"],
            "text"          => $text,
            "other_info"    => addslashes($other_info),
        ];

        $resDb = $this->DB->multi_duplicate_update("page_settings", [0 => $arr]);
        

        return ($resDb)? $resDb: true;
        
    }




    private function add_photo($input_name)
    {
        //загружаем картинку 1 ошибки, 2 тип, 3 размер
        $exp = $this->Upload->check_img($input_name, 2);

        //сохраняем картинку
        $img = new SimpleImage($_FILES[$input_name]["tmp_name"]);
        $filename = time().rand().".".$exp;
//        $out_path = $this->output.$filename;
        $DS = DIRECTORY_SEPARATOR;
        $img->best_fit(1200, 800)->save($this->output."big".$DS.$filename);
        $img->best_fit(250, 250)->save($this->output."small".$DS.$filename);

        return $filename;
    }


}