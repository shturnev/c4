<?
require_once "blocks/autoload.php";

define("STRANICA", "contact"); //stranica


$U = new User();
$PS = new PageSetting();

/*-----------------------------------
Init
-----------------------------------*/
$Admin = $U->is_admin();


/*-----------------------------------
Ифно про эту страницу
-----------------------------------*/
$page_info = $PS->get(["method" => 1, "stranica" => STRANICA]);


?>
<!DOCTYPE html>
<html>
<head>
    <title><? echo $page_info["meta_title"] ?></title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/adm-styles.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="<? echo $page_info["meta_key"] ?>" />
    <meta name="description" content="<? echo $page_info["meta_descr"] ?>" />

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
        <h1>Contact</h1>
        <em></em>
        <h2>
            <a href="index.php">Home</a>
            <label>/</label>Contact</a></h2>
    </div>
</div>

<div class="contact">

    <div class="contact-form">
        <div class="container">
            <div class="col-md-6 contact-left">
                <h3><? echo $page_info["title"] ?></h3>
                <? echo $page_info["text"] ?>

                <div class="address">
                    <div class=" address-grid">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <div class="address1">
                            <h3>Address</h3>
                            <p><? echo $page_info["other_info"]["address"] ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class=" address-grid ">
                        <i class="glyphicon glyphicon-phone"></i>
                        <div class="address1">
                            <h3>Our Phone:
                                <h3>
                                    <p><? echo $page_info["other_info"]["phone"] ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class=" address-grid ">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <div class="address1">
                            <h3>Email:</h3>
                            <p>
                                <a href="mailto:<? echo $page_info["other_info"]["email"] ?>"> <? echo $page_info["other_info"]["email"] ?></a>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class=" address-grid ">
                        <i class="glyphicon glyphicon-bell"></i>
                        <div class="address1">
                            <h3>Open Hours:</h3>
                            <p><? echo $page_info["other_info"]["hours"] ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 contact-top">
                <h3>Want to work with me?</h3>
                <form>
                    <div>
                        <span>Your Name </span>
                        <input type="text" value="">
                    </div>
                    <div>
                        <span>Your Email </span>
                        <input type="text" value="">
                    </div>
                    <div>
                        <span>Subject</span>
                        <input type="text" value="">
                    </div>
                    <div>
                        <span>Your Message</span>
                        <textarea> </textarea>
                    </div>
                    <label class="hvr-skew-backward">
                        <input type="submit" value="Send">
                    </label>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="map">
        <? echo $page_info["other_info"]["map"] ?>
    </div>
</div>

<!--//contact-->
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
<? require "blocks/footer.php"?>

<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="js/simpleCart.min.js"></script>
<!-- slide -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>