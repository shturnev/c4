<?

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="shortcut icon" href=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>
 
<body>
<main>
    <button><i class="material-icons">add</i></button>
    <br><br>
<? require "blocks/header.php" ?>
    <br><br>
    <ul>
        <li>
            <? for($i = 0;$i < 10;$i++){ ?>
            <a href="blog_in.php"><h1>заголовок</h1></a>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos iusto obcaecati odio soluta velit? Cupiditate dolore doloribus ea enim error excepturi fugit impedit iste iure labore laborum laudantium minus modi, mollitia nam nihil praesentium, provident quas quisquam recusandae rem reprehenderit sed sint tempora ut! Beatae blanditiis cum dolore nostrum repellendus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aut expedita, ipsam quo reiciendis voluptatum. Blanditiis cumque nihil praesentium tenetur.</div>
            <div class="btn">
                <a href="#"><button>Редактировать</button></a>
                <a href="#"><button>Удалить</button></a>
            </div>
            <? } ?>
        </li>
        
    </ul>

</main>


<script type="text/javascript" src=""></script>
</body>
</html>

