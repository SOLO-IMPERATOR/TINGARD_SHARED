<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?
/* global $USER; if ($USER->IsAdmin()) {
	echo '<pre>'; print_r($arResult); echo '</pre>';
} */
?>
																												
<ul class="vacancies-sections">
	<?foreach ($arResult['SECTIONS'] as $arSection):?>
	<li class="vacancies-sections__item">
		<h3 class="vacancies-sections__title section-subtitle"><?=$arSection['NAME']?></h3>
		<!-- <img class="vacancies-sections__img" src="<?=$arSection['PICTURE']['SRC']?>" alt="<?=$arSection['PICTURE']['TITLE']?>"> -->
		<div class="vacancies-sections__desc"><?=$arSection['DESCRIPTION']?></div>
		<a class="btn btn_color_green" href="<?=$arSection['SECTION_PAGE_URL']?>">Смотреть вакансии</a>
	</li>
	<?endforeach?>
</ul>