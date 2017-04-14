<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 14.04.2017
 * Time: 18:13
 */
class User
{

    public function __construct()
    {
        $this->DB = new DB();
    }

    public function is_admin($user_id)
    {

        if(!is_numeric($user_id)){ return false; }

        $sql = "SELECT * FROM users WHERE ID = ".$user_id." AND admin = 1";
        $resItem = $this->DB->get_row($sql);

        $res = ($resItem)? true : false;

        return $res;

    }

}