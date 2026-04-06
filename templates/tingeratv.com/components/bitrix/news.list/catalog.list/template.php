<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<ul class="header-nav__models">
	<?foreach ($arResult['ITEMS'] as $arItem):?>
	<li class="model-card">
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
			<img class="model-card__img" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>">
		</a>
		<a itemprop="url" class="model-card__name" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
		<a class="arrow-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"></a>
	</li>
	<?endforeach?>
</ul>