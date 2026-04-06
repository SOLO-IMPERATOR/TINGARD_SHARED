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

<?
global $USER; if ($USER->IsAdmin()) {
/* 	echo '<pre>'; print_r($arResult); echo '</pre>'; */
}
?>

<main>
	<section class="section container">
		<h1 class="page-title margin_b_m"><?if($arResult['SECTION']['DEPTH_LEVEL']==0):?><?='TINGER parts catalog'?><?else:?><?=isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != "" ? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] : $arResult['SECTION']['NAME']?><?endif?></h1>																																				
		<?if (0 < $arResult['SECTIONS_COUNT']):?>
		<div class="parts-categories margin_b_xl">
			<ul class="parts-categories__list">
				<?foreach ($arResult['SECTIONS'] as $arSection):?>
				<li class="parts-categories__item">
					<div class="parts-categories__head">
						<h2 class="parts-categories__name section-subtitle"><a class="parts-categories__name-link" href="<?=$arSection['SECTION_PAGE_URL']?>"><?=$arSection['NAME']; ?></a></h2>
						<?/*if('' != $arSection['DESCRIPTION']):?><p class="parts-categories__desc"><?=$arSection['DESCRIPTION']?></p><?endif*/?>
					</div>
					<div class="parts-categories__img-container">
						<a class="part-categories__img-link" href="<?=$arSection['SECTION_PAGE_URL']?>">
							<img class="parts-categories__img" src="<?=$arSection['PICTURE']['PREVIEW_WEBP_SRC_440_440']?>" alt="<?=$arSection['PICTURE']['TITLE']?>">
						</a>
					</div>
				</li>
				<?endforeach?>
				<?unset($arSection)?>
			</ul>
		</div>
		<?endif?>
	</section>
</main>