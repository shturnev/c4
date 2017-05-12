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
        $this->G  = new Gallery();
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


        //Поработаем над фото
        $this->G->add(["table_name" => "products", "table_id" => $res]);

        return $res;
    }
    public function edit($array)
    {
        $ID         = $array["ID"];
        $input_name = ($array["input_name"])? Security::shield_1($array["input_name"]) : "photo";
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
        if(!is_numeric($ID)){
            throw new \Exception("Не корректный id");}

        if(!$title){
            throw new \Exception("Назовите товар");}

        if(!is_numeric($cat_id) or !is_numeric($brand_id))
        {
            throw new \Exception("Выберите категорию и бренд");
        }

        //узнаем есть ли такая запись
        $sql = "SELECT * FROM products WHERE ID = ".$ID;
        $resItem = $this->DB->get_row($sql);
        if(!$resItem){
            throw new \Exception("Такой записи нет");}


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

        $res = $this->DB->update("products", $arr, "ID = ".$ID);


        //Поработаем над фото
        if($_FILES[$input_name]["tmp_name"][0]){
            $this->G->add(["table_name" => "products", "table_id" => $ID]);
        }

        return $res;
    }

    public function get_one($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректный id");}

        //делаем выборку
        $sql = "SELECT * FROM products WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);

        //собирем фоточки
        $resItem["photos"] = $this->G->get(["table_name" => "products", "table_id" => $id]);

        return $resItem;
    }

    public function get_few($settings)
    {
        $bound_type     = Security::shield_1($settings["bound_type"]); //[0]cat_id, [1]type_id
        $bound_id       = $settings["bound_id"]; //1,2
        $order_by_col   = Security::shield_1($settings["order_by_col"]);
        $order_by_type  = Security::shield_1($settings["order_by_type"]);


        //преобразуем данные
        if($bound_type)
        {
            $bound_type = explode(",", str_replace(" ", "", $bound_type));
        }

        if($bound_id){
            $bound_id = explode(",", preg_replace("/[^0-9,]/", "", $bound_id));
            $bound_id = array_filter($bound_id);
        }

        //проверки
        if($bound_type or $bound_id ){
            if(count($bound_type) != count($bound_id))
            {
                throw new \Exception("Не верно переданы параметры для bound_type и bound_id");
            }
        }


        //Формируем sql запрос
        if($bound_type && $bound_id)
        {
            for ($i = 0; $i < count($bound_type); $i++):
                $sql_arr[] = $bound_type[$i]."=".$bound_id[$i];
            endfor;

            $sql_dop = "WHERE ".implode(" AND ", $sql_arr);

        }
        else
        {
            $sql_dop = null;
        }

//        $sql_arr = ($bound_type && is_numeric($bound_id))? "WHERE ". $bound_type ."=".$bound_id : null;
        $sql = "SELECT COUNT(*) AS n FROM products ".$sql_dop;
        $all_posts = $this->DB->get_row($sql);
        if(!$all_posts["n"]){ return false; }


        $arr = [
            "limit" => (!is_numeric($settings["limit"]))? 30 : $settings["limit"],
            "page"  => $settings["page"],
            "posts" => $all_posts["n"],
        ];

        $resNav = Nav::get_nav($arr);

        $sql = "SELECT *, 
                (SELECT name FROM gallery WHERE table_name = 'products' AND table_id = products.ID LIMIT 1) AS photo,
                (SELECT name FROM categories WHERE ID = products.cat_id) AS cat_name
                FROM products ".$sql_dop." ORDER BY ".$order_by_col." ".$order_by_type." LIMIT ".$resNav["start"].",".$resNav["limit"];
        $resItems["items"] = $this->DB->get_rows($sql);
        $resItems["stack"] = $resNav["stack"];

        return $resItems;


        //limit, page, bound_type, bound_id, order_by_col, order_by_type (ASC, DESC)

    }





/*    public function get_few($settings)
    {
        $bound_type     = Security::shield_1($settings["bound_type"]); //cat_id,type_id
        $bound_id       = $settings["bound_id"]; //1,2
        $order_by_col   = Security::shield_1($settings["order_by_col"]);
        $order_by_type  = Security::shield_1($settings["order_by_type"]);

        //проверки
        $sql_arr = ($bound_type && is_numeric($bound_id))? "WHERE ". $bound_type ."=".$bound_id : null;
        $sql = "SELECT COUNT(*) AS n FROM products ".$sql_arr;
        $all_posts = $this->DB->get_row($sql);
        if(!$all_posts["n"]){ return false; }


        $arr = [
            "limit" => (!is_numeric($settings["limit"]))? 30 : $settings["limit"],
            "page"  => $settings["page"],
            "posts" => $all_posts["n"],
        ];

        $resNav = Nav::get_nav($arr);

        $sql = "SELECT *, 
                (SELECT name FROM gallery WHERE table_name = 'products' AND table_id = products.ID LIMIT 1) AS photo,
                (SELECT name FROM categories WHERE ID = products.cat_id) AS cat_name
                FROM products ".$sql_arr." ORDER BY ".$order_by_col." ".$order_by_type." LIMIT ".$resNav["start"].",".$resNav["limit"];
        $resItems["items"] = $this->DB->get_rows($sql);
        $resItems["stack"] = $resNav["stack"];

        return $resItems;


        //limit, page, bound_type, bound_id, order_by_col, order_by_type (ASC, DESC)

    }*/

}