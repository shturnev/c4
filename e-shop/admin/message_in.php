<?
require "../blocks/autoload.php";

$U = new User();
if(!$Admin = $U->is_admin()){header("Location: /e-shop"); exit;}

//----
$Msg = new Message();
try{
    $item = $Msg->get_one($_GET["ID"]);
}
catch(Exception $e){
    exit($e->getMessage());
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
    </div>

    <div class="add">
        <a href="brand_add_edit.php"><i class="material-icons">&#xE146;</i></a>
    </div>


    <div>
        <h4>От</h4>
        <p> <? echo $item["name"] . " - " . $item["email"] . " - ip:" . $item["ip"] ?></p>

        <h4>Тема</h4>
        <p> <? echo $item["subject"] ?></p>

        <h4>Дата</h4>
        <p> <? echo $item["subject"] ?></p>


        <h4>Текст</h4>
        <p> <? echo $item["text"] ?></p>
    </div>


</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../js/admin/jquery.fn.sortable.js"></script>
<script src="../js/admin/forSort.js"></script>
<script type="text/javascript" src="../js/admin/common.js"></script>
</body>
</html>