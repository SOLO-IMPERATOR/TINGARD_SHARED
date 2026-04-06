<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<section class="section section_padding-top_big section_padding-bottom_small lk company-news-detail">
    <?if((!isset($arParams["DISPLAY_NAME"]) || $arParams["DISPLAY_NAME"]!="N") && $arResult["NAME"]):?>
        <h2 class="section-title"><?=$arResult["NAME"]?></h2>
    <?endif;?>

    <?if((!isset($arParams["DISPLAY_DATE"]) || $arParams["DISPLAY_DATE"]!="N") && $arResult["DISPLAY_ACTIVE_FROM"]):?>
        <div class="company-news-detail__date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
    <?endif;?>
    <div class="company-news-detail__inner">
        <div class="company-news-detail__text">
            <?echo $arResult["DETAIL_TEXT"];?>
        </div>
        <div class="company-news-detail__img-container">
            <?if((!isset($arParams["DISPLAY_PICTURE"]) || $arParams["DISPLAY_PICTURE"]!="N") && is_array($arResult["DETAIL_PICTURE"])):?>
                <a class="glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/news-company-detail-img.jpg">
                <img
                        class="company-news-detail__img"
                        border="0"
                        src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                        width="<?$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                        height="<?$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                        alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                        title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                />
            <?endif?>
        </div>
    </div>
</section>