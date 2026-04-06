<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<div class="news-widget">
    <div class="news-widget__slider">
        <div class="news-widget__swiper swiper">
            <div class="swiper-wrapper">
                <?foreach ($arResult['ITEMS'] as $arItem) {?>
                    <div class="news-widget__slide swiper-slide">
                        <article>
                            <a class="news-small" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                                <div class="news-small__img-container">
                                    <?if(isset($arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_440_440'])):?>
                                    <img class="news-small__img" src="<?=$arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_440_440']?>" alt="<?=$arItem['NAME']?>">
                                    <?endif?>
                                </div>
                                <div class="news-small__container">
                                    <p class="news-small__title section-subtitle"><?=$arItem["NAME"]?></p>
                                    <p class="news-small__date"><?=$arItem["ACTIVE_FROM"]?></p>
                                    <div class="arrow-link"></div>
                                </div>
                            </a>
                        </article>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
    <div class="news-widget__bottom">
        <div class="news-widget__link-container">
            <a href="/<?=$arResult["CODE"]?>/">View all</a>
        </div>
        <div class="news-widget__arrows arrows">
            <button class="news-widget__arrows-prev arrows__btn"><img class="arrows__img" src="<?=SITE_TEMPLATE_PATH?>/img/arrow-prev.svg" alt="Prev"></button>
            <button class="news-widget__arrows-next arrows__btn"><img class="arrows__img" src="<?=SITE_TEMPLATE_PATH?>/img/arrow-next.svg" alt="Next"></button>
        </div>
    </div>
</div>