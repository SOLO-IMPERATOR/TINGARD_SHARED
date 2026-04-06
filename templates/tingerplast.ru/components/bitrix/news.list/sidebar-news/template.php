<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<ul class="sidebar-news__list">
	<?foreach ($arResult['ITEMS'] as $arItem):?>
	<li class="sidebar-news__item">
		<a class="sidebar-news__img-container" href="<?=$arItem['DETAIL_PAGE_URL']?>" alt="<?=$arItem['NAME']?>">
			<?if(isset($arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_50_50'])):?>
				<img class="sidebar-news__img" src="<?=$arItem['DETAIL_PICTURE']['PREVIEW_WEBP_SRC_50_50']?>" alt="<?=$arItem['NAME']?>">
			<?endif?>
		</a>
		<div class="sidebar-news__name">
			<a class="sidebar-news__link" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
		</div>
	</li>
	<?endforeach?>
</ul>

<a class="sidebar-news__more-btn" href="/<?=$arResult['CODE']?>/">Ещё <?=mb_strtolower($arResult['NAME'])?></a>