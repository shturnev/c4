<?
require "../blocks/autoload.php";

$U = new User();
if(!$Admin = $U->is_admin())
{
    header("Location: /e-shop"); exit;
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

    <ul class="items">
        <li>
            <div class="col-1">
                <img src="../FILES/brands/ic.png" alt="">
                <a href="#" class="edit">Lorem ipsum dolor.</a></div>
            <div class="col-2">
                <a href="#" class="delete"><i class="material-icons">&#xE14C;</i></a>
            </div>
        </li>
    </ul>
</main>

<script type="text/javascript" src=""></script>
</body>
</html>