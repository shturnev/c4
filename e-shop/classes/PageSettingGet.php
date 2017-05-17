<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 17.05.2017
 * Time: 18:29
 */
class PageSettingGet
{

    public function __construct()
    {
        $this->DB = new DB();
    }


    /**
     * 1 - get by stranica
     * @param $array - [method => 1(номер метода) ]
     * @return mixed
     */
    public function get($array)
    {
        $method = "method_".$array["method"]; //1
        return $this->$method($array);
    }


    //privat

    private function method_1($array)
    {
        $stranica = Security::shield_1($array["stranica"]);
        if(!$stranica){
            throw new \Exception("Отсутсвует параметр stranica");}


        //Узнаем есть ли уже такая запись
        $sql = "SELECT * FROM page_settings WHERE stranica = '".$stranica."'";
        $resItem = $this->DB->get_row($sql);

        $resItem["other_info"] = ($resItem["other_info"])? json_decode($resItem["other_info"], true) : null;

        return $resItem;

    }

}