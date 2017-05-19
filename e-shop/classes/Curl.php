<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 19.05.2017
 * Time: 19:32
 */
class Curl
{

    /**
     * @param $url
     * @param $GET_POST - варианты POST/GET
     * @param $data - в случае если тип передачи post, то неоходимо передать массив с данными для отправки
     * @return mixed
     */
    public static function sendCurl($url, $GET_POST, $data = null)
    {
        $curlObject = curl_init();

        curl_setopt($curlObject, CURLOPT_URL, $url);
        curl_setopt($curlObject, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlObject, CURLOPT_SSL_VERIFYHOST, false);

        if($GET_POST == "POST" && !is_null($data)){
            curl_setopt($curlObject, CURLOPT_POST, true);
            curl_setopt($curlObject, CURLOPT_POSTFIELDS, http_build_query($data,'','&'));
        }

        curl_setopt($curlObject, CURLOPT_RETURNTRANSFER, true);

        $responseData = curl_exec($curlObject);
        curl_close($curlObject);

        if($responseData){$responseData = json_decode($responseData, true); }
        return $responseData;
    }

}