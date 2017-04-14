<?

    if(!$E)
    {
        $E = new Enter();
    }

    $auth = $E->validate_coockie();

?>


<header>

    <div class="logo">
        <a href="/blog">
            <i class="material-icons">&#xE88A;</i>
        </a>
    </div>


    <? if($auth){ ?>
        <a href="register.php?logout=1">Выход</a>
    <? }else{ ?>
        <a href="login.php">Вход</a>
        <a href="register.php">Регистриция</a>
    <? } ?>
</header>