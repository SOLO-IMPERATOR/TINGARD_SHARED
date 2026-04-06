<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->addExternalJs('https://yastatic.net/share2/share.js');
/* echo '<pre>'; print_r($arResult['SECTION']['PATH'][0]['NAME']); echo '</pre>'; */
?>

<div class="container">
	<h1 class="page-title"><?=$arResult['NAME']?></h1>
</div>
<div class="vacancy container section section_padding_top_small section_padding_bottom_small">
	<div class="vacancy__preview"><?=$arResult['PREVIEW_TEXT']?></div>
	<div class="vacancy__head">
		<div class="vacancy__conditions">
			<div class="vacancy__salary section-subtitle"><?=$arResult['DISPLAY_PROPERTIES']['SALARY']['VALUE']?></div>
			<div class="vacancy__conditions-text"><?=$arResult['DISPLAY_PROPERTIES']['EXPERIENCE']['VALUE']?>, <?=$arResult['DISPLAY_PROPERTIES']['WORKTIME']['VALUE']?></div>
		</div>
		<div class="vacancy__btn-container">
			<button class="btn btn_color_green" type="button" onclick="openModal('vacancy', {'crm-entity': 'vacancy-deal', 'crm-title': 'Отклик на вакансию «<?=$arResult['NAME']?>»', 'crm-work': '<?=$arResult['SECTION']['PATH'][0]['NAME']?>', 'action': 'create-vacancies-deal'}, 'Оставьте ваши контактные данные и мы с вами свяжемся')">Откликнуться на вакансию</button>
		</div>
	</div>
	<div class="vacancy__slider swiper">
		<div class="swiper-wrapper">
			<div class="vacancy__img-container swiper-slide">
				<a class="glightbox" href="<?=$arResult['DETAIL_PICTURE']['WEBP_SRC_1280_720']?>">
					<picture>
						<source media="(max-width: 480px)" srcset="<?=$arResult['DETAIL_PICTURE']['WEBP_SRC_480_270']?>">
						<img class="vacancy__img" src="<?=$arResult['DETAIL_PICTURE']['WEBP_SRC_1280_720']?>" alt="<?=$arResult['NAME']?>">
					</picture>
				</a>
			</div>
			<?if (isset($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['FILE_VALUE'])):?>
			<div class="vacancy__img-container swiper-slide">
				<a class="glightbox" href="<?=$arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['WEBP_SRC_1280_720']?>">
					<picture>
						<source media="(max-width: 480px)" srcset="<?=$arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['WEBP_SRC_480_270']?>">
						<img class="vacancy__img" src="<?=$arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['WEBP_SRC_1280_720']?>" alt="<?=$arResult['NAME']?>">
					</picture>
				</a>
			</div>
			<?endif?>
			<?foreach($arResult['SECTION_GALLERY'] as $sectionImage):?>
			<div class="vacancy__img-container swiper-slide">
				<a class="glightbox" href="<?=$sectionImage['WEBP_SRC_1280_720']?>">
					<picture>
						<source media="(max-width: 480px)" srcset="<?=$sectionImage['WEBP_SRC_480_270']?>">
						<img class="vacancy__img" src="<?=$sectionImage['WEBP_SRC_1280_720']?>" alt="<?=$arResult['NAME']?>">
					</picture>
				</a>
			</div>
			<?endforeach?>
		</div>
	</div>
	<div class="vacancy__thumbs-slider swiper">
		<div class="swiper-wrapper">
			<div class="vacancy__thumbs-item swiper-slide">
				<img class="vacancy__thumbs-img" src="<?=$arResult['DETAIL_PICTURE']['WEBP_SRC_480_270']?>" alt="<?=$arResult['NAME']?>">
			</div>
			<?if (isset($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['FILE_VALUE'])):?>
			<div class="vacancy__thumbs-item swiper-slide">
				<img class="vacancy__thumbs-img" src="<?=$arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['WEBP_SRC_480_270']?>" alt="<?=$arResult['NAME']?>">
			</div>
			<?endif?>
			<?foreach($arResult['SECTION_GALLERY'] as $sectionImage):?>
			<div class="vacancy__thumbs-item swiper-slide">
				<img class="vacancy__thumbs-img" src="<?=$sectionImage['WEBP_SRC_480_270']?>" alt="<?=$arResult['NAME']?>">
			</div>
			<?endforeach?>
		</div>
	</div>
	<div class="vacancy__thumbs-arrows arrows">
		<button class="arrows__btn arrows__btn_direction_prev" title="Назад"><img class="arrows__img" src="<?=SITE_TEMPLATE_PATH?>/img/arrow-prev.svg" alt="Стрелка вперёд"></button>
		<button class="arrows__btn arrows__btn_direction_next" title="Вперёд"><img class="arrows__img" src="<?=SITE_TEMPLATE_PATH?>/img/arrow-next.svg" alt="Стрелка назад"></button>
	</div>
	<div class="vacancy__body html"><?=$arResult['DETAIL_TEXT']?></div>
	<div class="vacancy__bar">
		<div class="vacancy__manager">
			<div class="vacancy__manager-img-container">
				<img class="vacancy__manager-img" src="<?=$arResult['PROPERTIES']['MANAGER']['MANAGER_PHOTO_SRC']?>" alt="Менеджер вакансии <?=$arResult['PROPERTIES']['MANAGER']['MANAGER_NAME']?>">
			</div>
			<div class="vacancy__manager-name"><?=$arResult['PROPERTIES']['MANAGER']['MANAGER_NAME']?></div>
			<div class="vacancy__manager-label">менеджер вакансии</div>
			<?if(isset($arResult['PROPERTIES']['MANAGER']['MANAGER_PHONE'])):?>
			<div class="vacancy__manager-phone"><a href="tel:<?=$arResult['PROPERTIES']['MANAGER']['MANAGER_PHONE']?>"><?=$arResult['PROPERTIES']['MANAGER']['MANAGER_PHONE']?></a></div>
			<?endif?>
		</div>
		<div class="vacancy__share">
			<noindex><div class="ya-share2" data-services="vkontakte,odnoklassniki,whatsapp,telegram" data-copy="extraItem" data-color-scheme="whiteblack"></div></noindex>
		</div>
	</div>
	<div class="vacancy__bottom-btn-container">
		<button class="btn btn_color_green" type="button" onclick="openModal('vacancy', {'crm-entity': 'vacancy-deal', 'crm-work': '<?=$arResult['SECTION']['PATH'][0]['NAME']?>', 'crm-title': 'Отклик на вакансию «<?=$arResult['NAME']?>»', 'action': 'create-vacancies-deal'}, 'Оставьте ваши контактные данные и мы с вами свяжемся')">Откликнуться на вакансию</button>
	</div>
</div>