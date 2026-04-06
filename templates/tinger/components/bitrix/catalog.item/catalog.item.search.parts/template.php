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
				<span class="parts-search__item-availability parts-search__item-availability_status_long-waiting"><span class="tooltip tooltip_position_top">изготовим в течение 14-28 дней</span></span>
			<?elseif(($arResult['ITEM']['PROPERTIES']['PRODUCTION_POSITION']['VALUE'] == "Y") && ($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'Y')):?>
				<span class="parts-search__item-availability parts-search__item-availability_status_waiting"><span class="tooltip tooltip_position_top">изготовим в течение 7-14 дней</span></span>
			<?elseif($arResult['ITEM']['PRODUCT']['AVAILABLE'] == 'N'):?>
				<span class="parts-search__item-availability parts-search__item-availability_status_not-available"><span class="tooltip tooltip_position_top">нет в наличии</span></span>
			<?else:?>
				<span class="parts-search__item-availability parts-search__item-availability_status_available"><span class="tooltip tooltip_position_top">в наличии</span></span>
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
	<div class="parts-search__item-price"><?=$arResult['ITEM']['ITEM_PRICES'][0]['PRINT_RATIO_BASE_PRICE']?></div>
	<div class="parts-search__item-button-container">
		<button class="parts-search__item-button add-to-cart-btn" type="button" data-id="<?=$arResult['ITEM']['ID']?>" data-url="<?=$arResult['ITEM']['DETAIL_PAGE_URL']?>"<?if($arResult['ITEM']['PRODUCT']['AVAILABLE'] =="N"):?> disabled<?endif?>>В корзину<span class="tooltip tooltip_position_left"></span></button>
	</div>
</div>

<?//echo '<pre>'; print_r($arResult); echo '</pre>';?>