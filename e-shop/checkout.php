<?
require_once "blocks/autoload.php";

$U = new User();
$B = new Basket();
$E = new Enter();

/*-----------------------------------
Init
-----------------------------------*/
$auth = $E->validate_coockie();
if (!$auth) {
    header("Location: /e-shop/");
}
$Admin = $U->is_admin();


/*-----------------------------------
Узнаем инфо про корзину пользователя
-----------------------------------*/
$basketInfo = $B->get_few(["user_id" => $_COOKIE["user_id"]]);
if (!$basketInfo) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopin A Ecommerce Category Flat Bootstrap Responsive Website Template | Checkout :: w3layouts</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/adm-styles.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--theme-style-->
    <link href="css/style4.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <script src="js/jquery.min.js"></script>
    <!--- start-rate---->
    <script src="js/jstarbox.js"></script>
    <link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8"/>
    <script type="text/javascript">
        jQuery(function () {
            jQuery('.starbox').each(function () {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function (event, value) {
                    if (starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' ' + val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!---//End-rate---->
</head>
<body>
<!--header-->
<? require "blocks/header.php" ?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h1>Checkout</h1>
        <em></em>
        <h2>
            <a href="index.php">Home</a>
            <label>/</label>Checkout</a></h2>
    </div>
</div>
<!--login-->
<script>
    $(document).ready(function (c) {
        $('[data-js="delete_from_basket"]').on('click', function (c) {

            var par  = $(this).parents("tr"),
                href = $(this).attr("href");


            $.get(href, function (d) {

                var res = JSON.parse( d );
                if(res.error){ alert(res.error); return false; }

                $(par).fadeOut("slow");

            });

            return false;

        });
    });
</script>
<div class="container">
    <div class="check-out">
        <div class="bs-example4" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table-heading simpleCart_shelfItem">
                    <tr>
                        <th class="table-grid">Item</th>

                        <th>Prices</th>
                        <th>Delivery</th>
                        <th>Subtotal</th>
                    </tr>

                    <? foreach ($basketInfo as $item): ?>
                    <tr class="cart-header">

                        <td class="ring-in">
                            <a href="single.php?ID=<? echo $item["ID"] ?>" class="at-in">
                                <img src="FILES/gallery/small/<? echo $item["photo"] ?>" class="img-responsive" alt="">
                            </a>
                            <div class="sed">
                                <h5>
                                    <a href="single.php?ID=<? echo $item["ID"] ?>"><? echo $item["title"] ?></a>
                                </h5>
<!--                                <p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>-->

                            </div>
                            <div class="clearfix"></div>
                            <a href="options.php?method_name=delete_from_basket&ID=<? echo $item["ID"] ?>" class="close1" data-js="delete_from_basket" ></a>
                        </td>
                        <td>$<? echo $item["price"] ?> </td>
                        <td>FREE SHIPPING</td>
                        <td class="item_price">$ <? echo (int)$item["price"] * $item["units"] ?> </td>
                        <td class="add-check">
                            <a class="item_add hvr-skew-backward" href="#">Add To Cart</a>
                        </td>
                    </tr>
                    <? endforeach; ?>
                </table>
            </div>
        </div>
        <div class="produced">
            <a href="single.php" class="hvr-skew-backward">Produced To Buy</a>
        </div>
    </div>
</div>

<!--//login-->
<!--brand-->
<div class="container">
    <div class="brand">
        <div class="col-md-3 brand-grid">
            <img src="images/ic.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-3 brand-grid">
            <img src="images/ic1.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-3 brand-grid">
            <img src="images/ic2.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-3 brand-grid">
            <img src="images/ic3.png" class="img-responsive" alt="">
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//brand-->
</div>

</div>
<!--//content-->
<!--//footer-->
<div class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="col-md-3 footer-middle-in">
                <a href="index.php"><img src="images/log.png" alt=""></a>
                <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique
                    nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
            </div>

            <div class="col-md-3 footer-middle-in">
                <h6>Information</h6>
                <ul class=" in">
                    <li>
                        <a href="404.html">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="#">Returns</a>
                    </li>
                    <li>
                        <a href="contact.php">Site Map</a>
                    </li>
                </ul>
                <ul class="in in1">
                    <li>
                        <a href="#">Order History</a>
                    </li>
                    <li>
                        <a href="wishlist.html">Wish List</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Tags</h6>
                <ul class="tag-in">
                    <li>
                        <a href="#">Lorem</a>
                    </li>
                    <li>
                        <a href="#">Sed</a>
                    </li>
                    <li>
                        <a href="#">Ipsum</a>
                    </li>
                    <li>
                        <a href="#">Contrary</a>
                    </li>
                    <li>
                        <a href="#">Chunk</a>
                    </li>
                    <li>
                        <a href="#">Amet</a>
                    </li>
                    <li>
                        <a href="#">Omnis</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Newsletter</h6>
                <span>Sign up for News Letter</span>
                <form>
                    <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <ul class="footer-bottom-top">
                <li>
                    <a href="#"><img src="images/f1.png" class="img-responsive" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="images/f2.png" class="img-responsive" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="images/f3.png" class="img-responsive" alt=""></a>
                </li>
            </ul>
            <p class="footer-class">&copy; 2016 Shopin. All Rights Reserved | Design by
                <a href="http://w3layouts.com/" target="_blank">W3layouts</a>
            </p>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="js/simpleCart.min.js"></script>
<!-- slide -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>