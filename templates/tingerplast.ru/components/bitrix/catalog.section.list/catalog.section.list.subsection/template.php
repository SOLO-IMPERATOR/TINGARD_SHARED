<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?if(isset($arResult['SECTIONS'][0])):?>
<ul class="catalog-subsections">
<?foreach($arResult['SECTIONS'] as $section):?>
	<li class="catalog-subsections__item">
		<a class="catalog-subsections__link" href="<?=$section['SECTION_PAGE_URL']?>">
			<div class="catalog-subsections__title"><?=$section['NAME']?></div>
		</a>
	</li>
<?endforeach?>
</ul>
<?endif?>