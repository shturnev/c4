<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 05.05.2017
 * Time: 18:09
 */
class Product
{

    public function __construct()
    {
        $this->DB = new DB();
    }

    public function add($array)
    {
        $title      = Security::shield_1($array["title"]);
        $price      = Security::shield_1($array["price"]);
        $meta_title = Security::shield_1($array["meta_title"]);
        $meta_key   = Security::shield_1($array["meta_key"]);
        $meta_descr = Security::shield_1($array["meta_descr"]);

        $cat_id     = $array["cat_id"];
        $brand_id   = $array["brand_id"];
        $type_id    = $array["type_id"];

        $descr_1    = Security::shield_2($array["descr_1"]);
        $descr_2    = Security::shield_2($array["descr_2"]);
        $descr_3    = Security::shield_2($array["descr_3"]);

        //проверки
        if(!$title){
            throw new \Exception("Назовите товар");}

        if(!is_numeric($cat_id) or !is_numeric($brand_id))
        {
            throw new \Exception("Выберите категорию и бренд");
        }

        //пишем в базу
        $arr = [
            "cat_id"        => $cat_id,
            "brand_id"      => $brand_id,
            "type_id"       => (!$type_id)? 0: $type_id,
            "title"         => $title,
            "price"         => $price,
            "descr_1"       => $descr_1,
            "descr_2"       => $descr_2,
            "descr_3"       => $descr_3,
            "meta_title"    => $meta_title,
            "meta_key"      => $meta_key,
            "meta_descr"    => $meta_descr,
        ];

        $res = $this->DB->insert("products", $arr);

        return $res;
    }

}