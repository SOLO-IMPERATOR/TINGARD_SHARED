<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<section id="models" class="models section section_padding-top_small section_padding-bottom_small">
	<div class="container">
        <div class="models__inner">
		<h2 class="models__title section-title section-title_margin_bottom">Модельный ряд</h2>
		<ul class="models__list">
			<?foreach($arResult['ITEMS'] as $key => $arItem):?>
			<li class="models__item<?if($key === 0):?> models__item_active<?endif?>" data-capacity="<?=$arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?>">
				<div class="models__card-container">
					<div class="models__card">
						<div class="models__slider-container">
							<div class="models__slider swiper">
								<div class="swiper-wrapper">
									<?foreach($arItem['DISPLAY_PROPERTIES']['LANDING_GALLERY']['FILE_VALUE'] as $arFile):?>
										<?if($arFile['CONTENT_TYPE'] !== 'video/mp4'):?>
										<div class="models__slider-item swiper-slide">
											<a class="glightbox" href="<?=$arFile['SRC']?>">
												<picture>
													<source media="(max-width: 479px)" srcset="<?=CFile::ResizeImageGet($arFile, Array("width" => 480, "height" => 480), BX_RESIZE_IMAGE_PROPORTIONAL)['src'];?>">
													<source media="(max-width: 767px)" srcset="<?=CFile::ResizeImageGet($arFile, Array("width" => 680, "height" => 680), BX_RESIZE_IMAGE_PROPORTIONAL)['src'];?>">
													<img class="catalog-detail__img" src="<?=$arFile['SRC']?>" alt="<?=$arItem['NAME']?>">
												</picture>
											</a>
										</div>
										<?else:?>
										<div class="models__slider-item swiper-slide">
											<video preload="none" autoplay muted loop controls controlsList="nodownload nofullscreen">
												<source src="<?=$arFile['SRC']?>" type="video/mp4">
											</video>
										</div>
										<?endif?>
									<?endforeach?>
									</div>
								</div>
								<div class="models__bar">
									<div class="models__slider-arrows arrows">
										<button class="arrows__btn arrows__btn_direction_prev">Назад</button>
										<button class="arrows__btn arrows__btn_direction_next">Вперёд</button>
									</div>
									<?if($arItem['DISPLAY_PROPERTIES']['REVIEW_LINK']['VALUE']):?>
									<div class="models__review">
										<span class="models__review-label">Видеообзор ёмкости на <?=$arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?> кубов:</span>
										<a class="models__review-link glightbox" href="<?=$arItem['DISPLAY_PROPERTIES']['REVIEW_LINK']['VALUE']?>">Открыть видео</a>
									</div>
									<?endif?>
								</div>
								<div class="swiper catalog-detail__thumbs-slider">
									<div class="swiper-wrapper">
										<?foreach($arItem['DISPLAY_PROPERTIES']['LANDING_GALLERY']['FILE_VALUE'] as $arFile):?>
											<?if($arFile['CONTENT_TYPE'] !== 'video/mp4'):?>
											<div class="catalog-detail__thumbs-slider-item swiper-slide">
												<picture>
													<img class="catalog-detail__thumbs-slider-img" src="<?=CFile::ResizeImageGet($arFile, Array("width" => 150, "height" => 150), BX_RESIZE_IMAGE_PROPORTIONAL)['src'];?>" alt="<?=$arItem['NAME']?>">
												</picture>
											</div>
											<?else:?>
											<div class="models__thumbs-slider-item swiper-slide">
												<video preload="metadata" muted>
													<source src="<?=$arFile['SRC']?>#t=0.1" type="video/mp4">
												</video>
											</div>
											<?endif?>
										<?endforeach?>
									</div>
                       			</div>
							</div>
							<div class="models__info">
								<h3 class="models__name section-subtitle">Подземная ёмкость <?=$arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?> м<sup>3</sup> (PT <?=$arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?>)</h3>
								<div class="models__price"><span class="models__price_accent"><?=$arItem['DISPLAY_PROPERTIES']['PRICE']['VALUE']?></span> руб.</div>
								<ul class="models__chars">
									<li class="models__chars-item">
										<div class="models__chars-name">Материал</div>
										<div class="models__chars-value"><?=$arItem['DISPLAY_PROPERTIES']['MATERIAL']['VALUE']?></div>
									</li>
									<li class="models__chars-item">
										<div class="models__chars-name">Гарантия</div>
										<div class="models__chars-value">1 год</div>
									</li>
									<li class="models__chars-item">
										<div class="models__chars-name">Габариты, мм</div>
										<div class="models__chars-value">Д <?=$arItem['DISPLAY_PROPERTIES']['LENGTH']['VALUE']?> х Ш <?=$arItem['DISPLAY_PROPERTIES']['WIDTH']['VALUE']?> х В <?=$arItem['PROPERTIES']['HEIGHT']['VALUE']?></div>
									</li>
									<li class="models__chars-item">
										<div class="models__chars-name">Объём, куб. м</div>
										<div class="models__chars-value models__chars-value_type_capacity">
											<span class="models__chars-capacity-item<?if($arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE'] == 10):?> models__chars-capacity-item_active<?endif?>">10</span>
											<span class="models__chars-capacity-item<?if($arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE'] == 20):?> models__chars-capacity-item_active<?endif?>">20</span>
											<span class="models__chars-capacity-item<?if($arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE'] == 30):?> models__chars-capacity-item_active<?endif?>">30</span>
											<span class="models__chars-capacity-item<?if($arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE'] == 40):?> models__chars-capacity-item_active<?endif?>">40</span>
											<span class="models__chars-capacity-item<?if($arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE'] == 50):?> models__chars-capacity-item_active<?endif?>">50</span>
										</div>
									</li>
									<li class="models__chars-item">
										<div class="models__chars-name">Цвет</div>
										<div class="models__chars-value">синий / красный</div>
									</li>
									<li class="models__chars-item">
										<div class="models__chars-name">Масса, кг</div>
										<div class="models__chars-value"><?=$arItem['DISPLAY_PROPERTIES']['WEIGHT']['VALUE']?></div>
									</li>
									<li class="models__chars-item">
										<div class="models__chars-name">Толщина стенок</div>
										<div class="models__chars-value"><?=$arItem['DISPLAY_PROPERTIES']['WALL_THICKNESS']['VALUE']?></div>
									</li>
								</ul>
								<div class="models__buy" data-action="calc">
									<div class="models__num">
										<div class="models__num-title">Количество</div>
										<div class="models__num-container">
											<button class="models__num-btn models__num-btn_type_minus" data-action="calc-minus">-</button>
											<input class="models__num-input" type="number" readonly value="1" data-price="<?=$arItem['DISPLAY_PROPERTIES']['PRICE']['VALUE']?>">
											<button class="models__num-btn models__num-btn_type_plus" data-action="calc-plus">+</button>
										</div>
									</div>
									<div class="models__sum">
										<div class="models__sum-title">Сумма заказа</div>
										<div class="models__sum-value-container">
											<span class="models__sum-value" data-action="calc-total"><?=$arItem['DISPLAY_PROPERTIES']['PRICE']['VALUE']?></span> <span>руб.</span>
										</div>
									</div>
									<div class="models__btn-container">
										<button class="models__btn btn btn_type_turquoise-green" type="button" data-action="modal" data-modal-type="default" data-modal-title="Заказать ёмкость на <?=$arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?> кубов" data-crm-direction="16452" data-crm-comments="1 шт. на сумму <?=$arItem['DISPLAY_PROPERTIES']['PRICE']['VALUE']?> руб." data-crm-title="Заказать ёмкость на <?=$arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?> кубов">Заказать</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="models__visible-name-container">
						<div class="models__visible-name">Пластиковая ёмкость на <?=$arItem['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?> кубов</div>
					</div>
				</li>
				<?endforeach?>
			</ul>
		</div>
	</div>
</section>