<?
if(!$C){ $C = new Category(); }
$CatList = $C->get_few(["limit" => 15, "page" => 0])["items"];

if(!$T){ $T = new Type(); }
if(!$types){ $types = $T->get_few(["cat_id" => $CatList[0]["ID"]])["items"];  }

if(!$B){ $B = new Brand(); }
if(!$brands){ $brands = $B->get_few(["limit" => 150, "page" => 0])["items"];  }

?>

<!--categories-->
<div class=" rsidebar span_1_of_left">
    <h4 class="cate">Categories</h4>

    <? if($CatList){ ?>
    <ul class="menu-drop">
        <? foreach ($CatList as $item){ ?>
            <li class="item1"><a href="#"><? echo $item["name"] ?> </a>
                <ul class="cute">
                    <li class="subitem1"><a href="product.html">Cute Kittens </a></li>
                    <li class="subitem2"><a href="product.html">Strange Stuff </a></li>
                    <li class="subitem3"><a href="product.html">Automatic Fails </a></li>
                </ul>
            </li>
        <? } ?>

    </ul>
    <? } ?>
</div>
<!--initiate accordion-->
<script type="text/javascript">
    $(function() {
        var menu_ul = $('.menu-drop > li > ul'),
            menu_a  = $('.menu-drop > li > a');
        menu_ul.hide();
        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>
<!--//menu-->
<section  class="sky-form">
    <h4 class="cate">Discounts</h4>
    <div class="row row1 scroll-pane">
        <div class="col col-4">
            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto - 10% (20)</label>
        </div>
        <div class="col col-4">
            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
        </div>
    </div>
</section>


<!---->
<? if($types): ?>
<section  class="sky-form">
    <h4 class="cate">Type</h4>
    <div class="row row1 scroll-pane">
        <!--<div class="col col-4">
            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Sofa Cum Beds (30)</label>
        </div>-->
        <div class="col col-4">
            <? foreach ($types as $item):
                 $checked = ($item["ID"] == $resInfo["type_id"])? "checked" : null;
                ?>
                <label class="checkbox"><input type="checkbox" name="checkbox" <? echo $checked ?>><i></i><? echo $item["name"] ?> </label>
            <? endforeach; ?>
        </div>
    </div>
</section>
<? endif; ?>

<? if($brands): ?>
    <section  class="sky-form">
        <h4 class="cate">Brand</h4>
        <div class="row row1 scroll-pane">

            <div class="col col-4">
                <? foreach ($brands as $item):
                    $checked = ($item["ID"] == $resInfo["brand_id"])? "checked" : null;
                    ?>
                    <label class="checkbox"><input type="checkbox" name="checkbox" <? echo $checked ?>><i></i><? echo $item["name"] ?></label>
                <? endforeach; ?>
            </div>
        </div>
    </section>
<? endif; ?>