<?
require_once "blocks/autoload.php";

$U = new User();
$P = new Product();
$C = new Category();
$T = new Type();
$B = new Brand();



/*-----------------------------------
Init
-----------------------------------*/
$Admin = $U->is_admin();
$tovar_id = (is_numeric(@$_GET["ID"]))? $_GET["ID"] : 3;

/*-----------------------------------
инфо про эту запись
-----------------------------------*/
$resInfo = $P->get_one($tovar_id);

/*-----------------------------------
Категории + типы + бренды
-----------------------------------*/
$categories = $C->get_few(["limit" => 150, "page" => 0])["items"];
$types      = $T->get_few(["cat_id" => $resInfo["cat_id"]])["items"];
$brands     = $B->get_few(["limit" => 150, "page" => 0])["items"];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopin A Ecommerce Category Flat Bootstrap Responsive Website Template | <? echo $resInfo["meta_title"] ?></title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="<? echo $resInfo["meta_key"] ?>" />
    <meta name="description" content="<? echo $resInfo["meta_descr"] ?>" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--theme-style-->
    <link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/adm-styles.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <script src="js/jquery.min.js"></script>
    <!--- start-rate---->
    <script src="js/jstarbox.js"></script>
    <link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!---//End-rate---->
    <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<!--header-->
<? require "blocks/header.php"?>

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h1>Single</h1>
        <em></em>
        <h2><a href="index.php">Home</a><label>/</label><? echo $resInfo["title"] ?></a></h2>
    </div>
</div>
<div class="single">

    <div class="container">
        <div class="col-md-9">
            <div class="col-md-5 grid">
                <div class="flexslider">
                    <? if($resInfo["photos"]): ?>
                    <ul class="slides">
                        <? foreach ($resInfo["photos"] as $item): ?>
                        <li data-thumb="/e-shop/FILES/gallery/big/<? echo $item["name"] ?>">
                            <div class="thumb-image"> <img src="/e-shop/FILES/gallery/small/<? echo $item["name"] ?>" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <? endforeach; ?>
                    </ul>
                    <? endif ?>
                </div>
            </div>
            <div class="col-md-7 single-top-in">
                <div class="span_2_of_a1 simpleCart_shelfItem">
                    <h3><? echo $resInfo["title"] ?></h3>
                    <p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
                    <div class="price_single">
                        <span class="reducedfrom item_price">$<? echo $resInfo["price"] ?></span>
                        <a href="#">click for offer</a>
                        <div class="clearfix"></div>
                    </div>
                    <h4 class="quick">Quick Overview:</h4>
                    <div class="quick_desc"><? echo $resInfo["descr_1"] ?></div>
                    <div class="wish-list">
                        <ul>
                            <li class="wish"><a href="#"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>Add to Wishlist</a></li>
                            <li class="compare"><a href="#"><span class="glyphicon glyphicon-resize-horizontal" aria-hidden="true"></span>Add to Compare</a></li>
                        </ul>
                    </div>
                    <div class="quantity">
                        <div class="quantity-select">
                            <div class="entry value-minus">&nbsp;</div>
                            <div class="entry value"><span>1</span></div>
                            <div class="entry value-plus active">&nbsp;</div>
                        </div>
                    </div>
                    <!--quantity-->
                    <script>
                        $('.value-plus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                            divUpd.text(newVal);
                        });

                        $('.value-minus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                            if(newVal>=1) divUpd.text(newVal);
                        });
                    </script>
                    <!--quantity-->

                    <a href="#" class="add-to item_add hvr-skew-backward">Add to cart</a>
                    <div class="clearfix"> </div>
                </div>

            </div>
            <div class="clearfix"> </div>
            <!---->
            <div class="tab-head">
                <nav class="nav-sidebar">
                    <ul class="nav tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
                        <li class=""><a href="#tab2" data-toggle="tab">Additional Information</a></li>
                        <li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>
                    </ul>
                </nav>
                <div class="tab-content one">
                    <div class="tab-pane active text-style" id="tab1">
                        <div class="facts">
                            <? echo $resInfo["descr_2"] ?>
<!--                            <ul>-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>-->
<!--                            </ul>-->
                        </div>

                    </div>
                    <div class="tab-pane text-style" id="tab2">

                        <div class="facts">
                            <? echo $resInfo["descr_3"] ?>
<!--                            <ul >-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Multimedia Systems</li>-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Digital media adapters</li>-->
<!--                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Set top boxes for HDTV and IPTV Player  </li>-->
<!--                            </ul>-->
                        </div>

                    </div>
                    <div class="tab-pane text-style" id="tab3">

                        <div class="facts">
                            <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
                            <ul>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <!---->
        </div>
        <!----->

        <div class="col-md-3 product-bottom product-at">
            <? require "blocks/r-side-bar.php"; ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--brand-->
<div class="container">
    <? require "blocks/brand.php" ?>
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
                <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
            </div>

            <div class="col-md-3 footer-middle-in">
                <h6>Information</h6>
                <ul class=" in">
                    <li><a href="404.html">About</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="contact.php">Site Map</a></li>
                </ul>
                <ul class="in in1">
                    <li><a href="#">Order History</a></li>
                    <li><a href="wishlist.html">Wish List</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Tags</h6>
                <ul class="tag-in">
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Sed</a></li>
                    <li><a href="#">Ipsum</a></li>
                    <li><a href="#">Contrary</a></li>
                    <li><a href="#">Chunk</a></li>
                    <li><a href="#">Amet</a></li>
                    <li><a href="#">Omnis</a></li>
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
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <ul class="footer-bottom-top">
                <li><a href="#"><img src="images/f1.png" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/f2.png" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/f3.png" class="img-responsive" alt=""></a></li>
            </ul>
            <p class="footer-class">&copy; 2016 Shopin. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//footer-->
<script src="js/imagezoom.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>

<script src="js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>