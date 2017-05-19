<?
require "../blocks/autoload.php";

$U = new User();
if(!$Admin = $U->is_admin()){header("Location: /e-shop"); exit;}

//----
$Msg = new Message();
$items = $Msg->get_few(["limit" => 30, "page" => @$_GET["page"]]);



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
        <a href="brand_add_edit.php"><i class="material-icons">&#xE146;</i></a>
    </div>

    <? if($items["items"]): ?>
    <ul class="items sortable" data-table="brands">
        <? foreach ($items["items"] as $item): ?>
        <li data-id="<? echo $item["ID"] ?>" style="background-color: <? echo ($item["status"] < 1)? "orange" : "white" ?> ;">
            <div class="col-1" >
                <a href="message_in.php?ID=<? echo $item["ID"] ?>" class="edit"><? echo $item["subject"]."-". $item["email"] ?></a></div>
            <div class="col-2">
                <a href="../options.php?method_name=delete_item&classname=Brand&ID=<? echo $item["ID"] ?>" class="delete" data-js='delete'><i class="material-icons">&#xE14C;</i></a>
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