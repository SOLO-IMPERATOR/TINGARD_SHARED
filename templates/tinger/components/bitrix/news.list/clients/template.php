<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$ITEMS = $arResult['ITEMS'];
?>

<section class="clients margin_b_xl">
    <div class="container">
        <h2 class="clients__title section-title margin_b_m"><?=$arParams['PAGER_TITLE']?></h2>
    </div>
    <div class="clients__swiper swiper margin_b_m">
        <div class="swiper-wrapper">
            <?foreach ($ITEMS as $brands_itm) {?>
                <div class="clients__slide swiper-slide">
                    <img class="clients__img" src="<?=$brands_itm["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$brands_itm["NAME"]?>">
                </div>
            <?}?>
        </div>
    </div>
</section>