<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
$arItems = $arResult['ITEMS'];
?>
<div class="model-chars__swiper swiper">
	<div class="swiper-wrapper">
		<? foreach ($arItems as $arItem): ?>
			<div class="swiper-slide">
				<div class="model-chars__inner<? if (CSite::InDir('/catalog/tinger-rt2/')): ?> model-chars__inner_page_tinger-rt2<?endif?>">
					<div class="model-chars__img-container">
						<picture itemscope itemtype="http://schema.org/ImageObject">
							<img class="model-chars__img" itemprop="contentUrl"
								src="<?= CFile::GetPath($arItem['PROPERTIES']['C_PREVIEW_PICTURE']['VALUE']) ?>"
								alt="<?= $arItem["PROPERTIES"]["M_SHORT_NAME"]["VALUE"] ?>">
							<meta itemprop="name" content="<?= $arItem["PROPERTIES"]["M_SHORT_NAME"]["VALUE"] ?>">
							<meta itemprop="description" content="<?= $arItem["NAME"] ?>">
						</picture>
					</div>
					<div class="model-chars__tabs">
						<div class="tabs2">
							<div class="tabs2__head-container"<? if (CSite::InDir('/catalog/tinger-rt2/')): ?> style="display: none;"<?endif?>>
								<ul class="tabs2__head">
									<?if(!empty($arItem['PROPERTIES']['C_SPECIFICATIONS']['VALUE'])):?><li class="tabs2__head-item tabs2__head-item_active">Технические характеристики</li><?endif?>
									<?if(!empty($arItem['PROPERTIES']['GENERAL_CHARS']['VALUE'])):?><li class="tabs2__head-item">Общие характеристики</li><?endif?>
									<?if(!empty($arItem['PROPERTIES']['CROSS_COUNTRY_CHARS']['VALUE'])):?><li class="tabs2__head-item">Характеристики проходимости</li><?endif?>
									<? if (CSite::InDir('/catalog/perelomka/')): ?>
										<li class="tabs2__head-item">Базовая комплектация</li>
									<? endif ?>
								</ul>
							</div>
							
							<div class="tabs2__body">
								<?if(!empty($arItem['PROPERTIES']['C_SPECIFICATIONS']['VALUE'])):?>
								<div class="tabs2__body-item tabs2__body-item_active">
									<table class="model-chars__table">
										<? foreach ($arItem['PROPERTIES']['C_SPECIFICATIONS']['VALUE'] as $key => $value): ?>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td"><?= $value ?></td>
												<td class="model-chars__table-td">
													<?= $arItem['PROPERTIES']['C_SPECIFICATIONS']['DESCRIPTION'][$key] ?></td>
											</tr>
										<? endforeach ?>
									</table>
								</div>
								<? endif ?>
								<?if(!empty($arItem['PROPERTIES']['GENERAL_CHARS']['VALUE'])):?>
								<div class="tabs2__body-item">
									<table class="model-chars__table">
										<? foreach ($arItem['PROPERTIES']['GENERAL_CHARS']['VALUE'] as $key => $value): ?>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td"><?= $value ?></td>
												<td class="model-chars__table-td">
													<?= $arItem['PROPERTIES']['GENERAL_CHARS']['DESCRIPTION'][$key] ?></td>
											</tr>
										<? endforeach ?>
									</table>
								</div>
								<? endif ?>
								<?if(!empty($arItem['PROPERTIES']['CROSS_COUNTRY_CHARS']['VALUE'])):?>
								<div class="tabs2__body-item">
									<table class="model-chars__table">
										<? foreach ($arItem['PROPERTIES']['CROSS_COUNTRY_CHARS']['VALUE'] as $key => $value): ?>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td"><?= $value ?></td>
												<td class="model-chars__table-td">
													<?= $arItem['PROPERTIES']['CROSS_COUNTRY_CHARS']['DESCRIPTION'][$key] ?></td>
											</tr>
										<? endforeach ?>
									</table>
								</div>
								<? endif ?>
								<? if (CSite::InDir('/catalog/perelomka/')): ?>
									<div class="tabs2__body-item">
										<table class="model-chars__table">
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Электронный паспорт самоходной машины (эПСМ)
												</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Шины средней проходимости Salamandra (4 шт.)
												</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Диски сверхнизкого давления (БЕДЛОК) (4 шт.)
												</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Блокиратор шарнира сочленения рамы на
													скручивание</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Кузов с откидной дверцей на пневмоупорах</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Зеркала заднего вида (2 шт.) </td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Лобовое стекло с открыванием вперед</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Радиатор отопителя салона (жидкостный)</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Ремни безопасности передние (2 шт.)</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Панель управления с гнездами 12В и USB</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Сидения передние эргономичные (2 шт.)</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Стеклоочиститель лобового стекла</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Электронная панель приборов (версия 1.0)</td>
											</tr>
											<tr class="model-chars__table-tr">
												<td class="model-chars__table-td">Буксировочные скобы (ШАКЛЫ) (2 шт.)</td>
											</tr>




										</table>
									</div>
								<? endif ?>
							</div>

							<div class="model-chars__price-container">
								<p class="model-chars__price section-subtitle">Цена от
									<?= $arItem["PROPERTIES"]["C_PRICE"]["VALUE"] ?> руб.</p>
							</div>

							<div class="model-chars__btn-container">
								<? if (CSite::InDir('/catalog/perelomka/')): ?>
									<button class="btn btn_color_green" type="button"
										onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Купить переломку TINGER'})">Купить</button>
									<a class="btn btn_color_green"
										href="<?= $arItem['PROPERTIES']['CONFIGURATOR_LINK']['VALUE'] ?>">Конфигуратор</a>
							<? else: ?>
								<!-- <a class=" btn btn_color_green"
										href="<?= CFile::GetPath($arItem['PROPERTIES']['C_ALL_CHAR_PDF']['VALUE']) ?>"
										download>Характеристики в PDF</a> -->
										<? if (!CSite::InDir('/catalog/tinger-rt2/')): ?>
									<button class="btn btn_color_green" type="button" disabled>Характеристики в PDF</button>
									<a class="btn btn_color_green"
										href="<?= $arItem['PROPERTIES']['CONFIGURATOR_LINK']['VALUE'] ?>">Конфигуратор</a><?endif?>
								<? endif ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		<? endforeach ?>
	</div>
</div>