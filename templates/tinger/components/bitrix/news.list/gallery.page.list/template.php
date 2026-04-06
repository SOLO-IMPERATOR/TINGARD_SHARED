<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $USER;
$this->setFrameMode(true);
?>
<main>
	<section class="container section section_padding_top_small section_padding_bottom_big">
		
		<?if((count($arResult['ITEMS'])) == 0):?>
		<p>Здесь пока ничего нет</p>
		<?else:?>
		<div class="ajax-container gallery-list">
			<?foreach ($arResult['ITEMS'] as $arItem):?>
			<div class="ajax-item">
				<a class="glightbox" data-glightbox="title:<?=$arItem['NAME']?>; description:<?=$arItem['DETAIL_TEXT']?>" href="<?=$arItem['DETAIL_PICTURE']['WEBP_SRC_1920_1080']?>"><img src="<?=$arItem['DETAIL_PICTURE']['WEBP_SRC_480_270']?>" alt="<?=$arItemp['NAME']?>"></a>
			</div>
			<?endforeach?>
		</div>
		<?endif?>
		<?=$arResult['NAV_STRING']?>
	</section>
</main>