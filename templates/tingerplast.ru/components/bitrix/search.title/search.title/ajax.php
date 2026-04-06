<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!empty($arResult['CATEGORIES'][0]['ITEMS'])):?>
	<ul class="search-form__list">
		<?//echo '<pre>'; print_r($arResult); echo '</pre>'; ?>
		<?foreach($arResult['CATEGORIES'][0]['ITEMS'] as $arItem):?>
		<?if(isset($arItem['MODULE_ID'])):?>
		<li class="search-form__item-container">
			<a class="search-form__item search-form__item_type_result" href="<?=$arItem['URL']?>">
				<div class="search-form__img-container">
					<img class="search-form__img" src="<?if($arResult['ELEMENTS'][$arItem['ITEM_ID']]['PICTURE']['src']):?><?=$arResult['ELEMENTS'][$arItem['ITEM_ID']]['PICTURE']['src']?><?else:?><?=SITE_TEMPLATE_PATH . '/img/no-photo.svg'?><?endif?>" alt="Результаты поиска">
				</div>
				<p class="search-form__name"><?=$arItem['NAME']?></p>
				<p class="search-form__price"><?=$arResult['ELEMENTS'][$arItem['ITEM_ID']]['PRICES']['PRICE']['PRINT_VALUE_VAT']?></p>
			</a>
		</li>
		<?endif?>
		<?endforeach;?>
		<li class="search-form__item-container">
			<a class="search-form__item search-form__item_type_all" href="<?=$arResult['CATEGORIES']['all']['ITEMS'][0]['URL']?>"><?=$arResult['CATEGORIES']['all']['ITEMS'][0]['NAME']?></a>
		</li>
	</ul>
<?endif;?>