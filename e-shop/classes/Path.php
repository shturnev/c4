<?php

class Path{



    /**
     * Вывод чистого uri пути
     * @return string
     */
    public function clear_path(){
        //Правильнее будет сделать так:

        $DS    = DIRECTORY_SEPARATOR;
        $here  = strstr(__DIR__, $DS.'e-shop', true);
        $here .= $DS."e-shop".$DS;
        return $here;



        //return strstr(__DIR__, "\\".__NAMESPACE__, true); - старый вариант, могут возникать проблемы, на системах unix
    }

    /**
     * Вывод читого URL
     * @return string
     */
    public function clear_url($dir = null){
        return "http://". $_SERVER["HTTP_HOST"].$dir;
    }

    /**
     * Вывод адреса страницы без GET
     * @return string
     */
    public function withoutGet(){

        if($res = strstr($this->clear_url().$_SERVER["REQUEST_URI"], "?", true))
        {
            return $res;
        }
        else
        {
            return  $this->clear_url().$_SERVER["REQUEST_URI"];
        }

//        return  strstr($this->path_clear_url().$_SERVER["REQUEST_URI"], "?", true);
    }

    public function fullUrl()
    {
        return  $this->clear_url().$_SERVER["REQUEST_URI"];
    }




}




