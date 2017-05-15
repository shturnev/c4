<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 15.05.2017
 * Time: 18:31
 */
class Basket
{

    public function __construct()
    {
        $this->DB   = new DB();
        $this->E    = new Enter();
        $this->P    = new Product();
        $this->U    = new User();

        $this->Auth  = $this->E->validate_coockie();
        $this->Admin = $this->U->is_admin();

    }


    public function add($array)
    {
        $units = (!is_numeric($array["units"])) ? 1 : $array["units"];

        if (!is_numeric($product_id = $array["product_id"])) {
            throw new \Exception("Необходимо передать product_id");
        }

        if (!$this->Auth) {
            throw new \Exception("Необходимо авторизоваться");
        }

        //Узнаем что за товар
        $product_info = $this->P->get_one($product_id);
        if (!$product_info) {
            throw new \Exception("Такого товара нет");
        }

        //делаем запись в базу
        $arr = ["product_id" => $product_id, "date_of_add" => time(), "units" => $units, "ip" => $_SERVER["REMOTE_ADDR"], "user_id" => $_COOKIE["user_id"], "price" => $product_info["price"],];

        $res = $this->DB->insert("basket", $arr);

        return $res;
    }

    public function get_few($array)
    {
        $status  = (!$array["status"])? "wait" : Security::shield_1($array["status"]);
        $user_id = $array["user_id"];

        if(!is_numeric($user_id)){
            throw new \Exception("Не корректный user_id");}

        //делаем выборку
        $sql = "SELECT 
                t1.ID, t1.date_of_add, t1.units, t1.price, t1.ip, t1.status, t1.user_id, 
                t2.title, (SELECT name FROM gallery WHERE table_name = 'products' AND table_id = t2.ID LIMIT 1) AS photo
                FROM basket AS t1, products AS t2 WHERE t1.user_id = ".$user_id." AND t1.status = '".$status."' AND t2.ID = t1.product_id
                ORDER BY t1.ID DESC";


        $resItems = $this->DB->get_rows($sql);

        return $resItems;
    }

    public function delete($id)
    {
        if(!is_numeric($id)){
            throw new \Exception("Не корректный id");}

        //узнаем что это за запись
        $sql = "SELECT * FROM basket WHERE ID = ".$id;
        $resItem = $this->DB->get_row($sql);

        if(!$resItem){
            throw new \Exception("Такой записи нет");}

        if(!$this->Auth){
            throw new \Exception("Необходима авторизация");}

        if($resItem["user_id"] != $_COOKIE["user_id"] and !$this->Admin)
        {
            throw new \Exception("Не достаточно доступа");}


        $this->DB->delete("basket", "ID = ".$id);

    }

}