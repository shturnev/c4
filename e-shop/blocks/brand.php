<?
if(!$B){ $B = new Brand(); }
$BrandList = $B->get_few(["limit" => 4, "page" => 0])["items"];
?>


<div class="brand">
    <? if($Admin){ ?>
    <div class="col-md-12 text-right">
        <a href="/e-shop/admin/brand.php">Edit</a>
    </div>
    <? } ?>

    <? if($BrandList){foreach ($BrandList as $item){ ?>

        <div class="col-md-3 brand-grid">
            <img src="/e-shop/FILES/brands/<? echo $item["logo"] ?>" class="img-responsive" alt="">
        </div>

    <? }} ?>


    <div class="clearfix"></div>
</div>
