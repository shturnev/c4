<?php

/**
 * Created by PhpStorm.
 * User: Сергій
 * Date: 12.04.2017
 * Time: 0:08
 */

class DB
{
    private $logins = ['login' => 'stsv_c4', 'pass' => 'stsv', 'host' => '127.0.0.1', 'basename' => 'stsv_c4'];
    public $resConnect;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->resConnect = new mysqli($this->logins['host'], $this->logins['login'], $this->logins['pass'], $this->logins['basename']);

        if($this->resConnect->connect_error)
        {
            throw new \Exception($this->resConnect->connect_error);
        }
    }

    public function disconnect()
    {
        $this->resConnect->close();
    }

    //Вставить данные в таблицу
    public function insert($table, $array)
    {
        $this->connect();

        $keys = array_keys($array);
        $sql  = "INSERT INTO ".$table." (".implode(",", $keys).") VALUES ('".implode("','", $array)."')";

        $resInsert = $this->resConnect->query($sql);
        if(!$resInsert)
        {
            $error = $this->resConnect->error;
            $this->disconnect();
            throw new \Exception($error);
        }

        $result =  $this->resConnect->insert_id;
        $this->disconnect();

        return  $result;
    }

    public function update($table, $array, $where)
    {
        $this->connect();
        $keys = array_keys($array);
        $tmpSql = [];

        foreach ($keys as $key) {
            $tmpSql[] = $key."='".$array[$key]."'";
        }

        $sql = "UPDATE ".$table." SET ".implode(",", $tmpSql)." WHERE ".$where;

        $resQuery = $this->resConnect->query($sql);
        if(!$resQuery)
        {
            $error = $this->resConnect->error;
            $this->disconnect();
            throw new \Exception($error);
        }

        $this->disconnect();

        return true;
    }

    //Выборка 1 записи
    public function get_row($sql)
    {
        $this->connect();

        $resQuery = $this->resConnect->query($sql);

        if(!$resQuery)
        {
            $error = $this->resConnect->error;
            $this->disconnect();
            throw new \Exception($error);
        }

        if(!$resQuery->num_rows){
            return null;
        }

        $res = $resQuery->fetch_assoc();
        $this->disconnect();

        return $res;

    }

    public function get_rows($sql)
    {
        $this->connect();

        $resQuery = $this->resConnect->query($sql);

        if(!$resQuery)
        {
            $error = $this->resConnect->error;
            $this->disconnect();
            throw new \Exception($error);
        }

        if(!$resQuery->num_rows){
            return null;
        }

        $res = $resQuery->fetch_all(MYSQLI_ASSOC);
        $this->disconnect();

        return $res;

    }

    //удаление
    public function delete($table, $where)
    {
        $this->connect();

        $sql = "DELETE FROM ".$table." WHERE ".$where;
        $resQuery = $this->resConnect->query($sql);

        if(!$resQuery)
        {
            $error = $this->resConnect->error;
            $this->disconnect();
            throw new \Exception($error);
        }

        $this->disconnect();

        return true;
    }
}