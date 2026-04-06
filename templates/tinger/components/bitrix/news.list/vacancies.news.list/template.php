<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<?/* echo '<pre>'; print_r($arResult['SECTION']['PATH'][0]['NAME']); echo '</pre>'; */?>



<div class="container section section_padding_bottom_big section_padding_top_small">
	<?if(count($arResult['ITEMS']) > 0):?>
	<ul class="vacancies__list ajax-container">
		<?foreach ($arResult['ITEMS'] as $arItem):?>
		<li class="vacancies__item ajax-item">
			<div class="vacancies__img-container">
				<picture>
					<source media="(max-width: 480px)" srcset="<?=$arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_480_270']?>">
  					<source media="(max-width: 768px)" srcset="<?=$arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_768_432']?>">
					<img class="vacancies__img" src="<?=$arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_250_250']?>" alt="<?=$arItem['DETAIL_PICTURE']['ALT']?>">
				</picture>
			</div>
			<div class="vacancies__head">
				<div class="vacancies__name-container">
					<a class="vacancies__link" href="<?=$arItem['DETAIL_PAGE_URL']?>"><h2 class="vacancies__name section-title"><?=$arItem['NAME']?></h2></a>
				</div>
				<div class="vacancies__salary section-subtitle"><?=$arItem['DISPLAY_PROPERTIES']['SALARY']['VALUE']?></div>
				<div class="vacancies__experience"><?=$arItem['DISPLAY_PROPERTIES']['EXPERIENCE']['VALUE']?></div>
			</div>
			<div class="vacancies__desc"><?=$arItem['PREVIEW_TEXT']?></div>
			<div class="vacancies__btn-container">
				<a class="btn btn_color_green" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a>
			</div>
		</li>
		<?endforeach?>
	</ul>
	<?=$arResult['NAV_STRING']?>
	<?else:?>
		Активных вакансий пока нет
	<?endif?>
</div>
