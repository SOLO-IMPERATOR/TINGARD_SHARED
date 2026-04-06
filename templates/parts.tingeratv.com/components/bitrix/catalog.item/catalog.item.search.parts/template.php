<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
use \Bitrix\Main;

$this->setFrameMode(true);?>

<div class="parts-search__item">
	<div class="parts-search__item-img-container">
		<img class="parts-search__item-img" src="<?=$arResult['ITEM']['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['ITEM']['NAME']?>">
	</div>
	<div class="parts-search__item-sku"><?=$arResult['ITEM']['DISPLAY_PROPERTIES']['CML2_ARTICLE']['VALUE']?></div>
	<div class="parts-search__item-name">
		<a class="parts-search__item-link" href="<?=$arResult['ITEM']['DETAIL_PAGE_URL']?>">
			<?if(($arResult['ITEM']['PROPERTIES']['PRODUCTION_POSITION_LONG']['VALUE'] == "Y") && ($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'Y')):?>
				<span class="parts-search__item-availability parts-search__item-availability_status_long-waiting"><span class="tooltip tooltip_position_top">we will manufacture within 14-28 days</span></span>
			<?elseif(($arResult['ITEM']['PROPERTIES']['PRODUCTION_POSITION']['VALUE'] == "Y") && ($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'Y')):?>
				<span class="parts-search__item-availability parts-search__item-availability_status_waiting"><span class="tooltip tooltip_position_top">we will manufacture within 7-14 days</span></span>
			<?elseif($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'N'):?>
				<span class="parts-search__item-availability parts-search__item-availability_status_not-available"><span class="tooltip tooltip_position_top">not avaliable</span></span>
			<?else:?>
				<span class="parts-search__item-availability parts-search__item-availability_status_available"><span class="tooltip tooltip_position_top">in stock</span></span>
			<?endif?>
			<?=$arResult['ITEM']['NAME']?>
		</a>
		<ul class="parts-search__categories">
			<?foreach($arResult['ITEM']['SECTIONS'] as $category):?>
			<li class="parts-search__categories-item">
				<a class="parts-search__categories-link" href="<?=$category['URL']?>"><?=$category['SECTION_NAME']?> — <?=$category['SUBSECTION_NAME']?></a>
			</li>
			<?endforeach?>
		</ul>
	</div>
	<div class="parts-search__item-price"><?if($arResult['ITEM']['DISPLAY_PROPERTIES']['PRICE']['VALUE']):?>$<?=$arResult['ITEM']['DISPLAY_PROPERTIES']['PRICE']['VALUE']?><?endif?></div>
</div>

<?//echo '<pre>'; print_r($arResult); echo '</pre>';?>