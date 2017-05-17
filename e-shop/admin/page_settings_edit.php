<?
require "../blocks/autoload.php";

$U = new User();
$PS = new PageSetting();


/*-----------------------------------
Проверки
-----------------------------------*/
if(!$Admin = $U->is_admin())
{
    header("Location: /e-shop"); exit;
}

if(!$_GET["stranica"]){ header("Location: /e-shop"); exit; }

/*-----------------------------------
referer
-----------------------------------*/
$referer = ($_POST["referer"])? $_POST["referer"] : $_SERVER["HTTP_REFERER"];


/*-----------------------------------
Соберем инфо про запись
-----------------------------------*/
$item_info = $PS->get(["method" => 1, "stranica" => $_GET["stranica"]]);



/*-----------------------------------
Отправка формы
-----------------------------------*/
if($_POST["method_name"])
{

    try{
        $PS->edit($_POST);
        header("Location: ".$referer); exit;

    }
    catch(Exception $e){
        $error = $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="style/app.css"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

<main>

    <div class="crumps">
        <a href="/e-shop"><i class="material-icons">&#xE84F;</i></a>
        <a href="<? echo $referer ?>"><i class="material-icons">&#xE860;</i></a>
    </div>


    <? if($error){ ?>
        <div class="forError"><? echo $error ?></div>
    <? } ?>

    <div class="forForm">
        <form action="" method="post" enctype="multipart/form-data" name="myForm" target="_self">
            <input type="hidden" name="method_name" value="edit">
            <input type="hidden" name="referer" value="<? echo $referer ?>">
            <input type="hidden" name="stranica" value="<? echo $_GET["stranica"] ?>">


            <div>
                <b>Основной заголовок</b> <br>
                <input type="text" name="title" value="<? echo $item_info["title"] ?>"/>
            </div>
            <br><br>

            <div>
                <b>META заголовок</b> <br>
                <input type="text" name="meta_title" value="<? echo $item_info["meta_title"] ?>"/>
            </div>
            <br><br>

            <div>
                <b>META ключевые слова</b> <br>
                <input type="text" name="meta_key" value="<? echo $item_info["meta_key"] ?>"/>
            </div>
            <br><br>

            <div>
                <b>META описание</b> <br>
                <input type="text" name="meta_descr" value="<? echo $item_info["meta_descr"] ?>"/>
            </div>
            <br><br>

            <div>
                <b>Текст на кнопке</b> <br>
                <input type="text" name="btn_title" value="<? echo $item_info["btn_title"] ?>"/>
            </div>
            <br><br>

            <div>
                <b>Основной текст</b> <br>
                <textarea name="text" id="" cols="30" rows="10"><? echo $item_info["text"] ?></textarea>

            </div>
            <br><br>


            <? if($_GET["stranica"] == "contact"){ ?>
                <div>
                    <b>Address</b> <br>
                    <input type="text" name="other_info[address]" value="<? echo $item_info["other_info"]["address"] ?>"/>
                </div>
                <br><br>

                <div>
                    <b>Our Phone</b> <br>
                    <input type="text" name="other_info[phone]" value="<? echo $item_info["other_info"]["phone"] ?>"/>
                </div>
                <br><br>

                <div>
                    <b>Email</b> <br>
                    <input type="text" name="other_info[email]" value="<? echo $item_info["other_info"]["email"] ?>"/>
                </div>
                <br><br>

                <div>
                    <b>Open Hours</b> <br>
                    <input type="text" name="other_info[hours]" value="<? echo $item_info["other_info"]["hours"] ?>"/>
                </div>
                <br><br>               
                
                
                <div>
                    <b>Map</b> <br>
                    <textarea name="other_info[map]" id="" cols="30" rows="10"><? echo $item_info["other_info"]["map"] ?></textarea>


                    <? if($item_info["other_info"]["map"]) echo "<div>".$item_info["other_info"]["map"]."</div>"; ?>
                    
                </div>
                <br><br>



            <? } ?>



            <br>

            <div>
                <b>Лого</b> <br>
                <input type="file" name="photo" />

                <? if($item_info["photo"]){ ?>
                    <img src="../FILES/pages/small/<? echo $item_info["photo"] ?>" align="right">
                <? } ?>
            </div>

            <br>
            <div><input name="submit" type="submit" value="готово"/></div>
        </form>
    </div>




</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="../js/admin/api.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'text' );
</script>
</body>
</html>