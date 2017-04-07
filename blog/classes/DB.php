<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 29.03.2017
 * Time: 18:55
 */
class DB
{
    private $logins = ['login' => 'root', 'pass' => '', 'host' => '127.0.0.1', 'basename' => 'b4'];
    public $resConnect;

    public function __construct() //MAGIC METHODS
    {
//        $this->connect();
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

    /**
     * Вставить данные в таблицу
     *
     * @param $table - название таблицы
     * @param $array - массив данных для вставки
     * @return mixed - id вставленной строки
     * @throws Exception
     */
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


        $result["response"] = $this->resConnect->insert_id;
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

        return  true;
    }

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