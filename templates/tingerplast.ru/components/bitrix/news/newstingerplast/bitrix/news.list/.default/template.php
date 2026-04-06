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
<section class="section section_padding-top_big section_padding-bottom_small lk">
    <h2 class="section-title section-title_margin_bottom">Новости</h2>
    <div class="lk__desc">
        Важные новости компании
    </div>
    <div class="company-news">
        <?foreach($arResult["ITEMS"] as $arItem){?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $checkClass = 'company-news__item_status_unreaded';
            if($arResult['checkElements'][$arItem['ID']]) $checkClass = '';
            ?>
            <div class="company-news__item <?=$checkClass?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a class="company-news__title" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                <div class="company-news__date"><?=FormatDate('d.m.Y', MakeTimeStamp($arItem["DATE_CREATE"]))?></div>
            </div>
        <?}?>
    </div>
</section>