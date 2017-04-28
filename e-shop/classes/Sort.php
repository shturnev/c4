<?php

class Sort
{

    /**
     * Sort constructor.
     * @param $array - [list_data - [0 - > id], table - название таблицы в которой сортируем]
     * @throws Exception
     */
    public static function sorting($array){

        if(!is_array($array["list_data"])){
            throw new \Exception("Не корректные параметры"); }

        $table = Security::shield_1($array["table"]);

        $tmp = [];
        foreach ($array["list_data"] as  $nomer => $ID) {
            $tmp[$nomer]["ID"]      = (int) $ID;
            $tmp[$nomer]["nomer"]   = (int) $nomer;
        }

        $DB = new DB();
        $DB->multi_duplicate_update($table, $tmp, true);

        return true;
    }
}