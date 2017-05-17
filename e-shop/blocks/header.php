<?
if(!$E)
{
    $E = new Enter();
}

$auth = $E->validate_coockie();

/*-----------------------------------
Собирем типы
-----------------------------------*/
$T = new Type();

$MenTypes   = $T->get_few(["limit" => 15, "page" => 0, "cat_id" => 3])["items"];
$WomenTypes = $T->get_few(["limit" => 15, "page" => 0, "cat_id" => 4])["items"];

/*-----------------------------------
Ифно про категории
-----------------------------------*/
if(!$C){ $C = new Category(); }
$MainCategInfo["men"]   = $C->get_one(3);
$MainCategInfo["women"] = $C->get_one(4);


?>
<div class="header">

    <? if($Admin){ ?>
    <div class="admin-cont">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <ul class="links">
                        <li>
                            <a href="/e-shop/admin/page_settings_edit.php?stranica=<? echo STRANICA ?>">Ред-ть страницу</a>
                        </li>
                        <li>
                            <a href="/e-shop/admin/categories.php">Категории</a>
                        </li>
                        <li>
                            <a href="/e-shop/admin/product_add_edit.php">Добавить товар</a>
                        </li>
                        <? if($tovar_id): ?><li><a href="/e-shop/admin/product_add_edit.php?ID=<? echo $tovar_id ?>">Редактировать товар</a> </li><? endif ?>



                    </ul>

                </div>
            </div>
        </div>
    </div>
    <? } ?>

    <div class="container">
        <div class="head">
            <div class=" logo">
                <a href="index.php"><img src="images/logo.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="col-sm-5 col-md-offset-2  header-login">
                <ul >
                    <? if (!$auth){ ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <? }else{ ?>
                        <li><a href="options.php?method_name=logout">logout</a></li>
                    <? } ?>
                    <li><a href="checkout.php">Checkout</a></li>
                </ul>
            </div>

            <div class="col-sm-5 header-social">
                <ul >
                    <li><a href="#"><i></i></a></li>
                    <li><a href="#"><i class="ic1"></i></a></li>
                    <li><a href="#"><i class="ic2"></i></a></li>
                    <li><a href="#"><i class="ic3"></i></a></li>
                    <li><a href="#"><i class="ic4"></i></a></li>
                </ul>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="container">

        <div class="head-top">

            <div class="col-sm-8 col-md-offset-2 h_menu4">
                <nav class="navbar nav_bottom" role="navigation">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav nav_1">
                            <li><a class="color" href="index.php">Home</a></li>

                            <li class="dropdown mega-dropdown active">
                                <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">Women<span class="caret"></span></a>
                                <? if($WomenTypes): ?>
                                <div class="dropdown-menu">
                                    <div class="menu-top">
                                        <div class="col1">
                                            <div class="h_nav">
<!--                                                <h4>Submenu1</h4>-->
                                                <ul>
                                                    <? foreach ($WomenTypes as $item): ?>
                                                        <li><a href="product.php?bound_type=cat_id,type_id&bound_id=4,<? echo $item["ID"] ?>"><? echo $item["name"] ?></a></li>
                                                    <? endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <? if($MainCategInfo["women"]["photo"]): ?>
                                        <div class="col1 col5">
                                            <img src="/e-shop/FILES/categories/<? echo $MainCategInfo["women"]["photo"] ?>" class="img-responsive" alt="">
                                        </div>
                                        <? endif; ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <? endif ?>
                            </li>
                            <li class="dropdown mega-dropdown active">
                                <a class="color2" href="#" class="dropdown-toggle" data-toggle="dropdown">Men<span class="caret"></span></a>
                                <div class="dropdown-menu mega-dropdown-menu">
                                    <? if($MenTypes): ?>
                                    <div class="menu-top">
                                        <div class="col1">
                                            <div class="h_nav">

                                                <ul>
                                                    <? foreach ($MenTypes as $item): ?>
                                                        <li><a href="product.php?bound_type=cat_id,type_id&bound_id=3,<? echo $item["ID"] ?>"><? echo $item["name"] ?></a></li>
                                                    <? endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <? if($MainCategInfo["men"]["photo"]): ?>
                                            <div class="col1 col5">
                                                <img src="/e-shop/FILES/categories/<? echo $MainCategInfo["men"]["photo"] ?>" class="img-responsive" alt="">
                                            </div>
                                        <? endif ?>
                                        <div class="clearfix"></div>
                                    </div>
                                    <? endif; ?>
                                </div>
                            </li>
                            <li><a class="color3" href="product.html">Sale</a></li>
                            <li><a class="color4" href="404.html">About</a></li>
                            <li><a class="color5" href="typo.html">Short Codes</a></li>
                            <li ><a class="color6" href="contact.html">Contact</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->

                </nav>
            </div>
            <div class="col-sm-2 search-right">
                <ul class="heart">
                    <li>
                        <a href="wishlist.html" >
                            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        </a></li>
                    <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
                </ul>
                <div class="cart box_1">
                    <a href="checkout.html">
                        <h3> <div class="total">
                                <span class="simpleCart_total"></span></div>
                            <img src="images/cart.png" alt=""/></h3>
                    </a>
                    <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                </div>
                <div class="clearfix"> </div>

                <!----->

                <!---pop-up-box---->
                <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
                <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
                <!---//pop-up-box---->
                <div id="small-dialog" class="mfp-hide">
                    <div class="login-search">
                        <div class="login">
                            <input type="submit" value="">
                            <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
                        </div>
                        <p>Shopin</p>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });

                    });
                </script>
                <!----->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>