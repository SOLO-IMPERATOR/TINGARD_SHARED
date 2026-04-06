<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
global $USER;
$this->setFrameMode(true);
$item = $arResult["ITEMS"][1];
?>

<section class="intro">
	<div class="intro__img-container">
		<picture>
			<img itemprop="image" class="intro__img" src="<?=$item['DETAIL_PICTURE']['SRC']?>" alt="Колёсный вездеход TINGER Armor">
		</picture>
		</div>
	<div class="intro__inner container">
		<h1 class="intro__title title margin_b_s">Вездеходы TINGER от производителя</h1>
		<p class="intro__subtitle section-title margin_b_m">Цена от 1 936 000 руб.</p>
		<div class="into__btn-container">
			<a class="popup-link btn btn--light" href="#popup-quiz">Подобрать вездеход</a>
		</div>
	</div>
</section>
