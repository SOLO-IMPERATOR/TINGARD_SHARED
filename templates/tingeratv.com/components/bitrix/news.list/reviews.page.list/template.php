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
$items = $arResult['ITEMS'];

?>


<main>
	<div class="container">
		<h1 class="page-title">Отзывы и видеообзоры</h1>
	</div>
	<section class="reviews-list container section section_padding_bottom_small section_padding_top_small">
		<ul class="reviews-list__inner">
			<?foreach ($items as $item):?>
			<li class="reviews-list__item">
				<div class="reviews-list__img-container">
					<a href="<?=$item['DETAIL_PAGE_URL']?>">
						<img class="reviews-list__img" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
					</a>
				</div>
				<a href="<?=$item['DETAIL_PAGE_URL']?>" class="reviews-list__name section-subtitle"><?=$item['NAME']?></a>
				<a class="link-arrow" href="<?=$item['DETAIL_PAGE_URL']?>">Подробнее</a>
			</li>
			<?endforeach?>
		</ul>
		<?=$arResult['NAV_STRING']?>
	</section>
	<?=$arResult['SEO_TEXT']?>
</main>