<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$arItems = $arResult['ITEMS'];
?>
<div class="model-chars__swiper swiper">
	<div class="swiper-wrapper">
		<?foreach ($arItems as $arItem):?>
		<div class="swiper-slide">
			<div class="model-chars__inner">
				<div class="model-chars__img-container">
					<picture itemscope itemtype="http://schema.org/ImageObject">
						<img class="model-chars__img" itemprop="contentUrl" src="<?=CFile::GetPath($arItem['PROPERTIES']['C_PREVIEW_PICTURE']['VALUE'])?>" alt="<?=$arItem["PROPERTIES"]["M_SHORT_NAME"]["VALUE"]?>">
						<meta itemprop="name" content="<?=$arItem["PROPERTIES"]["M_SHORT_NAME"]["VALUE"]?>">
						<meta itemprop="description" content="<?=$arItem["NAME"]?>">
					</picture>
				</div>
				<div class="model-chars__tabs">
					<div class="tabs2">
						<div class="tabs2__head-container">
							<ul class="tabs2__head">
								<li class="tabs2__head-item tabs2__head-item_active">Specifications</li>
								<li class="tabs2__head-item">General characteristics</li>
								<li class="tabs2__head-item">Cross-country ability</li>
							</ul>
						</div>
						<div class="tabs2__body">
							<div class="tabs2__body-item tabs2__body-item_active">
								<table class="model-chars__table">
									<?foreach ($arItem['PROPERTIES']['C_SPECIFICATIONS']['VALUE'] as $key => $value):?>
									<tr class="model-chars__table-tr">
										<td class="model-chars__table-td"><?=$value?></td>
										<td class="model-chars__table-td"><?=$arItem['PROPERTIES']['C_SPECIFICATIONS']['DESCRIPTION'][$key]?></td>
									</tr>
									<?endforeach?>
								</table>
							</div>
							<div class="tabs2__body-item">
								<table class="model-chars__table">
									<?foreach ($arItem['PROPERTIES']['GENERAL_CHARS']['VALUE'] as $key => $value):?>
									<tr class="model-chars__table-tr">
										<td class="model-chars__table-td"><?=$value?></td>
										<td class="model-chars__table-td"><?=$arItem['PROPERTIES']['GENERAL_CHARS']['DESCRIPTION'][$key]?></td>
									</tr>
									<?endforeach?>
								</table>
							</div>
							<div class="tabs2__body-item">
								<table class="model-chars__table">
								<?foreach ($arItem['PROPERTIES']['CROSS_COUNTRY_CHARS']['VALUE'] as $key => $value):?>
									<tr class="model-chars__table-tr">
										<td class="model-chars__table-td"><?=$value?></td>
										<td class="model-chars__table-td"><?=$arItem['PROPERTIES']['CROSS_COUNTRY_CHARS']['DESCRIPTION'][$key]?></td>
									</tr>
								<?endforeach?>
								</table>
							</div>
						</div>
						
						<div class="model-chars__btn-container">
							<?if(CSite::InDir('/catalog/perelomka/')):?>
								<button class="btn btn_color_green" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Купить переломку TINGER'})">Buy</button>
								<a class="btn btn_color_green" href="/configurator/">Configurator</a>
							<?else:?>
								<a class="btn btn_color_green" href="<?=CFile::GetPath($arItem['PROPERTIES']['C_ALL_CHAR_PDF']['VALUE'])?>" download>Характеристики в PDF</a>
								<a class="btn btn_color_green" href="/configurator/">Конфигуратор</a>
							<?endif?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<?endforeach?>
	</div>
</div>