<?
require "../blocks/autoload.php";

$U = new User();
$B = new Brand();
$C = new Category();
$T = new Type();
$P = new Product();

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
    $item_info = $B->get_one($_GET["ID"]);
}

/*-----------------------------------
Категории + типы + бренд
-----------------------------------*/
$catItems  = $C->get_few(["limit" => 150, "page" => 0])["items"];

$catId = ($item_info)? $item_info["cat_id"] : $catItems[0]["ID"];

$Types  = $T->get_few(["limit" => 150, "page" => 0, "cat_id" => $catId])["items"];
$Brands = $B->get_few(["limit" => 150, "page" => 0])["items"];

/*-----------------------------------
Отправка формы
-----------------------------------*/
if($_POST["method_name"])
{

    try{
        $P->$method($_POST);
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
                <b>Категория</b> <br>

                <select name="cat_id" data-js="get_types">
                    <? foreach ($catItems as $item){ ?><option value="<? echo $item["ID"] ?>"><? echo $item["name"] ?></option><? } ?>
                </select>
            </div>

            <br><br>

            <div>
                <b>Brand</b> <br>

                <select name="brand_id" >
                    <? foreach ($Brands as $item){ ?><option value="<? echo $item["ID"] ?>"><? echo $item["name"] ?></option><? } ?>
                </select>
            </div>

            <br><br>

            <div>
                <b>Тип</b> <br>

                <select name="type_id" data-js="set_types">
                    <? foreach ($Types as $item){ ?><option value="<? echo $item["ID"] ?>"><? echo $item["name"] ?></option><? } ?>
                </select>
            </div>


            <br><br>
            <div>
                <b>Название</b> <br>
                <input type="text" name="title" value="<? echo $item_info["title"] ?>"/>
            </div>

            <br><br>
            <div>
                <b>Цена</b> <br>
                <input type="text" name="price" value="<? echo $item_info["price"] ?>"/>
            </div>

            <br><br>
            <div>
                <b>QUICK OVERVIEW</b> <br>
                <textarea name="descr_1"><? echo $item_info["descr_1"] ?></textarea>
            </div>

            <br><br>
            <div>
                <b>Product Description</b> <br>
                <textarea name="descr_2"><? echo $item_info["descr_2"] ?></textarea>
            </div>


            <br><br>
            <div>
                <b>Additional Information</b> <br>
                <textarea name="descr_3"><? echo $item_info["descr_3"] ?></textarea>
            </div>

            <br>


            <br><br>
            <hr>
            <br>

            <div>
                <b>Meta title</b> <br>
                <input type="text" name="meta_title" value="<? echo $item_info["meta_title"] ?>"/>
            </div>

            <br><br>

            <div>
                <b>Meta description</b> <br>
                <input type="text" name="meta_descr" value="<? echo $item_info["meta_descr"] ?>"/>
            </div>

            <br><br>

            <div>
                <b>Meta key</b> <br>
                <input type="text" name="meta_key" value="<? echo $item_info["meta_key"] ?>"/>
            </div>



            <br>
            <div><input name="submit" type="submit" value="готово"/></div>
        </form>
    </div>




</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
<script src="../js/admin/api.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'descr_1' );
    CKEDITOR.replace( 'descr_2' );
    CKEDITOR.replace( 'descr_3' );

</script>
</body>
</html>