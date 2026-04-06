<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="about-sections__tabs tabs">
	<div class="tabs__head-container">
		<div class="tabs__head">
			<div class="tabs__caption" data-tab="rtf">Ротоформовочная продукция</div>
			<div class="tabs__caption" data-tab="extr">Экструзия</div>
			<div class="tabs__caption" data-tab="atv">Мотовездеходная техника</div>
		</div>
	</div>
	<div class="tabs__body">
		<div class="tabs__content about-sections__slider-container" data-tab="rtf">
			<div class="about-sections__slider swiper">
				<ul class="about-sections__slider-wrapper swiper-wrapper">
				<?foreach($arResult['ROOT']['SECTIONS'] as $section):?>
					<?if($section['UF_GENERAL_SECTION'] == 4):?>
					<li class="about-sections__list swiper-slide">
						<a class="about-sections__img-container" href="<?=$section['SECTION_PAGE_URL']?>">
							<img class="about-section__img" src="<?=$section['PICTURE']['SRC']?>" alt="<?=$section['PICTURE']['ALT']?>">
						</a>
						<div class="about-sections__link-container">
							<a class="about-sections__link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
						</div>
					</li>
					<?endif?>
				<?endforeach?>
				</ul>
			</div>
		</div>
		<div class="tabs__content about-sections__slider-container" data-tab="extr">
			<div class="about-sections__slider swiper">
				<ul class="about-sections__slider-wrapper swiper-wrapper">
				<?foreach($arResult['ROOT']['SECTIONS'] as $section):?>
					<?if($section['UF_GENERAL_SECTION'] == 5):?>
					<li class="about-sections__list swiper-slide">
						<a class="about-sections__img-container" href="<?=$section['SECTION_PAGE_URL']?>">
							<img class="about-section__img" src="<?=$section['PICTURE']['SRC']?>" alt="<?=$section['PICTURE']['ALT']?>">
						</a>
						<div class="about-sections__link-container">
							<a class="about-sections__link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
						</div>
					</li>
					<?endif?>
				<?endforeach?>
				</ul>
			</div>
		</div>
		<div class="tabs__content about-sections__slider-container" data-tab="atv">
			<div class="about-sections__slider swiper">
				<ul class="about-sections__slider-wrapper swiper-wrapper">
				<?foreach($arResult['ROOT']['SECTIONS'] as $section):?>
					<?if($section['UF_GENERAL_SECTION'] == 6):?>
					<li class="about-sections__list swiper-slide">
						<a class="about-sections__img-container" href="<?=$section['SECTION_PAGE_URL']?>">
							<img class="about-section__img" src="<?=$section['PICTURE']['SRC']?>" alt="<?=$section['PICTURE']['ALT']?>">
						</a>
						<div class="about-sections__link-container">
							<a class="about-sections__link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
						</div>
					</li>
					<?endif?>
				<?endforeach?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="about-sections__btn-container">
	<a class="btn btn_type_default" href="/">Перейти в каталог</a>
</div>