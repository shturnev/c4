<?php

/**
 * Project C4.
 * User: sht_j
 * Date: 17.04.2017
 * Time: 16:28
 */
class Upload
{

    public function __construct()
    {

    }

    public static function checkError($n)
    {
        $arr = [
             1 => "Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini."
            ,2 => "Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме."
            ,3 => "Загружаемый файл был получен только частично."
            ,4 => "Файл не был загружен."
            ,6 => "Отсутствует временная папка. Добавлено в PHP 5.0.3."
            ,7 => "Не удалось записать файл на диск. Добавлено в PHP 5.1.0."
            ,8 => "PHP-расширение остановило загрузку файла. PHP не предоставляет способа определить какое расширение остановило загрузку файла; в этом может помочь просмотр списка загруженных расширений из phpinfo(). Добавлено в PHP 5.2.0."
        ];

        if($arr[$n]){
            throw new \Exception($arr[$n]); }
    }

    public static function check_mime($type, $allow = "zip")
    {
        $zip = [
                    "application/x-compressed",
                    "application/x-zip-compressed",
                    "application/zip",
                    "multipart/x-zip",
        ];

        $image = [
            "image/jpeg"    => "jpg",
            "image/pjpeg"   => "jpg",
            "image/gif"     => "gif",
            "image/png"     => 'png',
            "image/x-png"   => "png",
        ];


        if(!$$allow[$type]){
            throw new \Exception("Формат не поддержуется");
        }

        return $$allow[$type];

    }


    /**
     * Проверка перед загрузкой файла (ошибка, тип, размер)
     * @param $input_name - название поля формы
     * @param string $size - допустимый размер файла в мб
     * @return mixed - расширение файла, например jpg
     * @throws Exception
     */
    public function check_img($input_name, $size = "3")
    {
        //1 ошибки
        Self::checkError($_FILES[$input_name]["error"]);

        //2 тип
        $exp = Self::check_mime($_FILES[$input_name]["type"], "image");

        //3 размер
        $B = new ByteConverter();
        if($size < $B->getMBytes($_FILES[$input_name]["size"]."b"))
        {
            throw new \Exception("Превышен размер файла");
        }


        return $exp;

    }

    public function check_multi_img($input_name, $i, $size = "3")
    {
        //1 ошибки
        Self::checkError($_FILES[$input_name]["error"][$i]);

        //2 тип
        $exp = Self::check_mime($_FILES[$input_name]["type"][$i], "image");

        //3 размер
        $B = new ByteConverter();
        if($size < $B->getMBytes($_FILES[$input_name]["size"][$i]."b"))
        {
            throw new \Exception("Превышен размер файла");
        }


        return $exp;

    }


}