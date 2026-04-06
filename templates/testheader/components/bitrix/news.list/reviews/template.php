<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<ul class="reviews-list ajax-container">
	<?foreach ($arResult['ITEMS'] as $item):?>
	<li class="reviews-list__item-container ajax-item">
		<div class="reviews-item__name"><?=$item['NAME']?></div>
		<div class="reviews-list__item" data-entity="review">
			<div class="reviews-list__head">
				<div class="reviews-item__img-container">
					<img class="reviews-item__img" src="<?=SITE_TEMPLATE_PATH?>/img/person-icon.svg" alt="Иконка автора отзыва">
				</div>
				<div class="reviews-list__info">
					<div class="reviews-item__author"><?=$item['PROPERTIES']['AUTHOR']['VALUE']?></div>
					<div class="reviews-item__date">от <?=$item['DISPLAY_ACTIVE_FROM']?></div>
					<div class="reviews__rating rating">
						<div class="rating__inner">
							<?if($item['PROPERTIES']['RATING']['VALUE'] <> 0):?>
							<div class="rating__overlay rating__overlay_value_<?=$item['PROPERTIES']['RATING']['VALUE']?>"></div>
							<?endif?>
						</div>
					</div>
				</div>
			</div>
			<?if(is_countable($item['PROPERTIES']['GALLERY']['VALUE'])):?>
				<ul class="reviews-list__files">
					<?foreach($item['PROPERTIES']['GALLERY']['VALUE'] as $file):?>
						<?$fileArr = CFile::GetFileArray($file);?>
						<?if(str_contains($fileArr['CONTENT_TYPE'], 'video')):?>
						<li class="reviews-list__files-item">
							<video class="reviews-list__files-video" preload="metadata" controls>
								<source src="<?=$fileArr['SRC']?>#t=0.1" type="<?=$fileArr['CONTENT_TYPE']?>">
							</video>
						</li>
						<?endif?>
						<?unset($fileArr);?>
					<?endforeach?>
					<?foreach($item['DISPLAY_PROPERTIES']['GALLERY']['WEBP'] as $image):?>
						<li class="reviews-list__files-item">
							<a class="glightbox" href="<?=$image['BIG']?>" alt="Приложение к отзыву"><img class="reviews-list__files-img" src="<?=$image['SMALL']?>" alt="Приложение к отзыву"></a>
						</li>
					<?endforeach?>
				</ul>
			<?endif?>
			<?if(isset($item['PROPERTIES']['INTRO']['VALUE']['TEXT'])):?>
			<div class="reviews-list__intro"><?=$item['PROPERTIES']['INTRO']['VALUE']['TEXT']?></div>
			<?endif?>
			<div class="reviews-item__body">
				<blockquote class="blockquote"><?=$item['DETAIL_TEXT']?></blockquote>
			</div>
			<button class="reviews-list__show-btn btn_color_blue btn btn_small" onclick="showReview(event)">Развернуть отзыв</button>
		</div>
	</li>
	<?endforeach?>
</ul>

<?=$arResult['NAV_STRING']?>