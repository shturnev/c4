<? require_once "blocks/autoload.php";

   if(!is_numeric($_GET["ID"])){
       header("Location: index.php"); exit;
   }

    $B = new Blog();
    $U = new User();


    $admin = $U->is_admin($_COOKIE["user_id"]);


try {
    $item_info = $B->get_one($_GET["ID"]);
} catch (Exception $e) {
    exit($e->getMessage());
}



?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title><? echo $item_info["title"] ?></title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="styles/app.css"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>

<body>

<main>
    <? require "blocks/header.php" ?>


    <section id="blog-list">


        <? require "blocks/plus_btn.php" ?>



        <ul >

            <li>
                <h2 class="for-title"><? echo $item_info["title"] ?></h2>
                <div class="descr">
                    <? echo $item_info["text"] ?>
                </div>
                <div class="btns">
                    <a href="blog_edit.php?ID=<? echo $item_info["ID"] ?>">Редактировать</a>
                    <a href="options.php?method_name=del_blog&ID=<? echo $item_info["ID"] ?>">Удалить</a>
                </div>
            </li>

        </ul>
    </section>
</main>


<script type="text/javascript" src=""></script>
</body>
</html>

