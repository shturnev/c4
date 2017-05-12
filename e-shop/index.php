<?
require_once "blocks/autoload.php";

$U = new User();
$P = new Product();

/*-----------------------------------
Init
-----------------------------------*/
$Admin = $U->is_admin();


/*-----------------------------------
Собирем товары
-----------------------------------*/
$products = $P->get_few(["limit" => 8, "page" => 0, "order_by_col" => "ID", "order_by_type" => "DESC"])["items"];


?>
<!DOCTYPE html>
<html>
<head>
<title>Shopin A Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--theme-style-->
<link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->

<!--Наши стили-->
<link href="css/adm-styles.css" rel="stylesheet" type="text/css" media="all" />


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

</head>
<body>
<!--header-->
<? require "blocks/header.php" ?>

<!--banner-->
<div class="banner">
<div class="container">
<section class="rw-wrapper">
				<h1 class="rw-sentence">
					<span>Fashion &amp; Beauty</span>
					<div class="rw-words rw-words-1">
						<span>Beautiful Designs</span>
						<span>Sed ut perspiciatis</span>
						<span> Totam rem aperiam</span>
						<span>Nemo enim ipsam</span>
						<span>Temporibus autem</span>
						<span>intelligent systems</span>
					</div>
					<div class="rw-words rw-words-2">
						<span>We denounce with right</span>
						<span>But in certain circum</span>
						<span>Sed ut perspiciatis unde</span>
						<span>There are many variation</span>
						<span>The generated Lorem Ipsum</span>
						<span>Excepteur sint occaecat</span>
					</div>
				</h1>
			</section>
			</div>
</div>
	<!--content-->
		<div class="content">
			<div class="container">
				<div class="content-top">
					<div class="col-md-6 col-md">
						<div class="col-1">
						 <a href="single.php" class="b-link-stroke b-animate-go  thickbox">
		   <img src="images/pi.jpg" class="img-responsive" alt=""/><div class="b-wrapper1 long-img"><p class="b-animate b-from-right    b-delay03 ">Lorem ipsum</p><label class="b-animate b-from-right    b-delay03 "></label><h3 class="b-animate b-from-left    b-delay03 ">Trendy</h3></div></a>

							<!---<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
						</div>
						<div class="col-2">
							<span>Hot Deal</span>
							<h2><a href="single.php">Luxurious &amp; Trendy</a></h2>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years</p>
							<a href="single.php" class="buy-now">Buy Now</a>
						</div>
					</div>
					<div class="col-md-6 col-md1">
						<div class="col-3">
							<a href="single.php"><img src="images/pi1.jpg" class="img-responsive" alt="">
							<div class="col-pic">
								<p>Lorem Ipsum</p>
								<label></label>
								<h5>For Men</h5>
							</div></a>
						</div>
						<div class="col-3">
							<a href="single.php"><img src="images/pi2.jpg" class="img-responsive" alt="">
							<div class="col-pic">
								<p>Lorem Ipsum</p>
								<label></label>
								<h5>For Kids</h5>
							</div></a>
						</div>
						<div class="col-3">
							<a href="single.php"><img src="images/pi3.jpg" class="img-responsive" alt="">
							<div class="col-pic">
								<p>Lorem Ipsum</p>
								<label></label>
								<h5>For Women</h5>
							</div></a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<!--products-->
                <? if($products): ?>
                    <div class="content-mid">
                        <h3>Trending Items</h3>
                        <label class="line"></label>
                        <? $i = 1; $i2 = 0; foreach ($products as $item):

                             if($i > 4){ $i = 1; }

                             if($i > 4 or $i == 1){

                             ?>
                                 <div class="mid-popular">
                             <? } ?>
                                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                                <div class=" mid-pop">
                                    <div class="pro-img">
                                        <img src="FILES/gallery/small/<? echo $item["photo"] ?>" class="img-responsive" alt="">
                                        <div class="zoom-icon ">
                                            <a class="picture" href="FILES/gallery/big/<? echo $item["photo"] ?>" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                            <a href="single.php?ID=<? echo $item["ID"] ?>"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                        </div>
                                    </div>
                                    <div class="mid-1">
                                        <div class="women">
                                            <div class="women-top">
                                                <span><? echo $item["cat_name"] ?></span>
                                                <h6><a href="single.php?ID=<? echo $item["ID"] ?>"><? echo $item["title"] ?></a></h6>
                                            </div>
                                            <div class="img item_add">
                                                <a href="#"><img src="images/ca.png" alt=""></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="mid-2">
                                            <p ><!--<label>$100.00</label>--><em class="item_price">$<? echo $item["price"] ?></em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?
                            if($i == 4 or $i2 == count($products)  ){
                        ?>
                                <div class="clearfix"></div>
                            </div>
                        <? } ?>
                        <? $i++; $i2++;  endforeach; ?>

                    </div>
                <? endif; ?>
			<!--//products-->
			<!--brand-->
                <? require "blocks/brand.php"?>
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
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="contact.html">Site Map</a></li>
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="js/bootstrap.min.js"></script>
<!--light-box-files -->
		<script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
		<!--light-box-files -->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('a.picture').Chocolat();
		});
		</script>


</body>
</html>