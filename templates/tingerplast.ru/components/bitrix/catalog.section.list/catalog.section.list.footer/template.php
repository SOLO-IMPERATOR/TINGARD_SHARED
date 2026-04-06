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

<ul class="sections-list">
	<?foreach($arResult['SECTIONS'] as $section):?>
	
	<?if($section['DEPTH_LEVEL'] > 1):?>
	<li class="sections-list__item">
		<a class="sections-list__link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
	</li>
	<?endif?>
	<?endforeach?>
</ul>
