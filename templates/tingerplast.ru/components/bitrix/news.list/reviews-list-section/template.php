<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
/* echo '<pre>'; print_r($arSection); echo '</pre>'; */
?>

<ul class="reviews-list">
	<?foreach ($arResult['ITEMS'] as $item):?>
	<li class="reviews-list__item">
		<div class="reviews-list__head">
			<div class="reviews-item__img-container">
				<img class="reviews-item__img" src="<?=SITE_TEMPLATE_PATH?>/img/person-icon.svg" alt="Иконка автора отзыва">
			</div>
			<div class="reviews-list__info">
				<div class="reviews-item__author" itemtype="https://schema.org/Person"><?=$item['PROPERTIES']['AUTHOR']['VALUE']?></div>
				<div class="reviews-item__date">от <?=$item['DISPLAY_ACTIVE_FROM']?></div>
				<div class="reviews__rating rating">
					<div class="rating__inner">
						<?if($item['PROPERTIES']['RATING']['VALUE'] <> 0):?>
						<div class="rating__overlay rating__overlay_value_<?=$item['PROPERTIES']['RATING']['VALUE']?>"></div>
						<?endif?>
					</div>
				</div>
				<div class="reviews-list__link-container">
					<a class="reviews-list__link" href="<?=$item['DETAIL_PAGE_URL']?>">Читать весь отзыв</a>
				</div>
			</div>
		</div>
		<div class="reviews-item__body">
			<div class="reviews-item__name-container">
				<a class="reviews-item__name" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a>
			</div>
			<blockquote class="blockquote" cite="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['PREVIEW_TEXT']?></blockquote>

		</div>
	</li>
	<?endforeach?>

	<a class="btn btn_type_default" href="/reviews/otzyvy-o-pogrebakh-tingard/">Смотреть все</a>
</ul>