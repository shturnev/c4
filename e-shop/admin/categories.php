<?
require "../blocks/autoload.php";

$U = new User();
if(!$Admin = $U->is_admin()){header("Location: /e-shop"); exit;}

//----
$C = new Category();
$items = $C->get_few(["limit" => 30, "page" => @$_GET["page"]]);



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
    </div>

    <div class="add">
        <a href="categories_add_edit.php"><i class="material-icons">&#xE146;</i></a>
    </div>

    <? if($items["items"]): ?>
    <ul class="items sortable" data-table="categories">
        <? foreach ($items["items"] as $item): ?>
        <li data-id="<? echo $item["ID"] ?>">
            <div class="col-1">
<!--                <img src="../FILES/brands/--><?// echo $item["logo"] ?><!--" alt="">-->

                <a href="types.php?cat_id=<? echo $item["ID"] ?>" class="edit">Типы</a>
                |
                <a href="categories_add_edit.php?ID=<? echo $item["ID"] ?>" class="edit"><? echo $item["name"] ?></a></div>
            <div class="col-2">
                <a href="../options.php?method_name=delete_item&classname=Category&ID=<? echo $item["ID"] ?>" class="delete" data-js='delete'><i class="material-icons">&#xE14C;</i></a>
            </div>
        </li>
        <? endforeach; ?>
    </ul>
    <? endif; ?>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../js/admin/jquery.fn.sortable.js"></script>
<script src="../js/admin/forSort.js"></script>
<script type="text/javascript" src="../js/admin/common.js"></script>
</body>
</html>