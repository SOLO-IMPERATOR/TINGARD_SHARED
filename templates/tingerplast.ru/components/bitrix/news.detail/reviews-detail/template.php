<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->addExternalJs('https://yastatic.net/share2/share.js');
?>

<h1 class="page-title page-title_margin_bottom"><?=$arResult['NAME']?></h1>

<div class="review">

	<div class="review__head">
		<div class="review__img-container">
			<img class="review__img" src="<?=SITE_TEMPLATE_PATH?>/img/person-icon.svg" alt="Иконка автора отзыва">
		</div>
		<div class="review__info">
			<div class="review__author"><?=$arResult['PROPERTIES']['AUTHOR']['VALUE']?></div>
			
			<div class="review__rating rating">
				<div class="rating__inner">
					<?if($arResult['PROPERTIES']['RATING']['VALUE'] <> 0):?>
					<div class="rating__overlay rating__overlay_value_<?=$arResult['PROPERTIES']['RATING']['VALUE']?>"></div>
					<?endif?>
				</div>
			</div>
		</div>
	</div>

	<?/*echo '<pre>'; print_r($arResult['PROPERTIES']['INTRO']); echo '</pre>';*/?>

	<?if(isset($arResult['PROPERTIES']['INTRO']['VALUE']['TEXT'])):?>
	<div class="review__text">
		<?=$arResult['PROPERTIES']['INTRO']['VALUE']['TEXT']?>
	</div>
	<?endif?>

	<div class="review__body">
		<blockquote class="review__blockquote blockquote" cite="<?=$item['DETAIL_PAGE_URL']?>"><?=$arResult['DETAIL_TEXT']?></blockquote>
		<div class="review__product"><span class="review__product_accent">Продукт:</span> <?foreach($arResult['DISPLAY_PROPERTIES']['PRODUCT']['LINK_ELEMENT_VALUE'] as $product) { $temp[] = '<a href="' . $product['DETAIL_PAGE_URL'] . '">' . $product['NAME'] . '</a>'; }?><?=implode(', ', $temp); unset($temp);?></div>
	</div>

	<div class="review__footer">
		<div class="review__files-container">
			<div class="section-subtitle section-subtitle_margin_bottom">Прикреплённые файлы:</div>
			<ul class="review__files">
			<?foreach($arResult['PROPERTIES']['GALLERY']['VALUE'] as $file):?>
				<?$fileArr = CFile::GetFileArray($file);?>
				<?if(str_contains($fileArr['CONTENT_TYPE'], 'video')):?>
				<li class="review__files-item">
					<video class="review__files-video" preload="metadata" controls>
						<source src="<?=$fileArr['SRC']?>#t=0.1" type="<?=$fileArr['CONTENT_TYPE']?>">
					</video>
				</li>
				<?endif?>
				<?unset($fileArr);?>
				<?endforeach?>
				<?foreach($arResult['DISPLAY_PROPERTIES']['GALLERY']['WEBP'] as $image):?>
				<li class="review__files-item">
					<a class="glightbox" href="<?=$image['BIG']?>" alt="Приложение к отзыву" data-alt="Приложение к отзыву"><img class="review__files-img" src="<?=$image['SMALL']?>" alt="Приложение к отзыву"></a>
				</li>
				<?endforeach?>
			</ul>
		</div>
		<div class="review__bar">
			<div class="review__date">от <?=$arResult['DISPLAY_ACTIVE_FROM']?></div>
			<div class="review__share">
				<div class="ya-share2" data-services="vkontakte,odnoklassniki,whatsapp,telegram" data-copy="extraItem" data-color-scheme="whiteblack"></div>
			</div>
		</div>
	</div>
</div>