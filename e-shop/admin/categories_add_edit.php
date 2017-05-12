<?
require "../blocks/autoload.php";

$U = new User();
$C = new Category();

if(!$Admin = $U->is_admin())
{
    header("Location: /e-shop"); exit;
}

/*-----------------------------------
referer
-----------------------------------*/
$referer = ($_POST["referer"])? $_POST["referer"] : $_SERVER["HTTP_REFERER"];

//
$method = (is_numeric($_GET["ID"]))? "edit" :  "add";

/*-----------------------------------
Соберем инфо про запись
-----------------------------------*/
if($method == "edit")
{
    $item_info = $C->get_one($_GET["ID"]);
}


/*-----------------------------------
Отправка формы
-----------------------------------*/
if($_POST["method_name"])
{

    try{
        $C->$method($_POST);
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
            <input type="hidden" name="method_name" value="<? echo $method ?>">
            <input type="hidden" name="referer" value="<? echo $referer ?>">
            <input type="hidden" name="ID" value="<? echo $item_info["ID"] ?>">


            <div>
                <b>Название</b> <br>
                <input type="text" name="name" value="<? echo $item_info["name"] ?>"/>
            </div>


            <br>

            <div>
                <b>Фото</b> <br>
                <input type="file" name="photo" />

                <? if($item_info["photo"]){ ?>
                    <img src="../FILES/categories/<? echo $item_info["photo"] ?>" align="right">
                <? } ?>
            </div>

            <br>
            <div><input name="submit" type="submit" value="готово"/></div>
        </form>
    </div>




</main>

<script type="text/javascript" src=""></script>
</body>
</html>