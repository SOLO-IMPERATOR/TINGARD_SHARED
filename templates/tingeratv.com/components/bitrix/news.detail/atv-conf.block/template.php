<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $USER;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss('/local/templates/tinger/css/components/configurator.css');
Asset::getInstance()->addCss('/local/templates/tinger/css/components/configurator-widget.css');
$this->setFrameMode(true);?>


<div id="conditions" data-simbol-code="<?=$arResult["CODE"]?>" data-mods-name="<?=$arResult["MODEL"][$arResult["ID"]][0]["UF_NAME"]?>">
	<div id="conditions__short-name" style="display:none;"><?=$arResult['PROPERTIES']['M_SHORT_NAME']['VALUE']?></div>
	<div class="conf-widget">
		<?if (is_countable($arResult["PACKS"][$arResult["ID"]])) {?>
			<div class="conf-widget__packages-container">
				<div class="conf-widget__packages margin_b_s">
					<?for ($i = 0; $i < count($arResult["PACKS"][$arResult["ID"]]); $i++) {
						$modul_collection = '';
						$mods_name = array();
						$mod_pack = array();
						$active_modification;
						
						for ($j = 0; $j < count($arResult["PACKS"][$arResult["ID"]][$i]["UF_MODS"]); $j++) {
							for ($k = 0; $k < count($arResult['CONF_MODULES']); $k++) {
								if ($arResult['CONF_MODULES'][$k]["ID"] == $arResult["PACKS"][$arResult["ID"]][$i]["UF_MODS"][$j]) {
									$modul_collection .= ','.$arResult['CONF_MODULES'][$k]["ID"];
								}
							}
						}

						foreach ($arResult["MODEL"][$arResult["ID"]] as $get_active_modification) {
							if ($get_active_modification["ID"] == $arResult["PACKS"][$arResult["ID"]][$i]["UF_MODEL"]) {
								$active_modification = $get_active_modification["UF_NAME"];
							}
						}

						?>

						<label class="conf-widget__package" data-modul-name="<?=$active_modification?>" data-modul-collection="<?=$modul_collection?>" data-simbol-code="<?=$arResult["CODE"]?>">
							<input class="conf-widget__package-input" data-mods-name="" data-modul-collection="<?=$modul_collection?>" data-simbol-code="<?=$arResult["CODE"]?>" type="radio" onMouseDown="this.isChecked=this.checked;" onClick="this.checked=!this.isChecked;" name="package" value="0">
							<span class="conf-widget__package-radiobox">
								<span class="conf-widget__package-name section-subtitle"><?=$arResult["PACKS"][$arResult["ID"]][$i]["UF_NAME"]?></span>
								<span class="conf-widget__package-benefit">Package</span>
							</span>
						</label>
					<?}?>

				</div>
			</div>
		<?}?>
		<div class="conf-widget__visual margin_b_s">
			<div class="conf-widget__slider margin_b_m">
				<?if (!empty($arResult['PROPERTIES']['CONF_COLOR_MODEL']['VALUE'])) {?>
					<div class="conf-widget__color-selected">
						<span class="conf-widget__color-tagline">Selected color:</span>
						<span class="conf-widget__color"></span>
					</div>
					<div class="conf-widget__color-list margin_b_s">
						<?for ($i = 0; $i < count($arResult['PROPERTIES']['CONF_COLOR_MODEL']['VALUE']); $i++) {?>
							<?
								$color = [];
								foreach ($arResult["COLORS"] as $set_color) {
									if ($set_color["UF_XML_ID"] == $arResult['PROPERTIES']['CONF_COLOR_MODEL']['VALUE'][$i]) {
										$color = $set_color;
									}
								}
							?>
							<label class="conf-widget__color-item">
								<input class="radio__input" data-entity="color" data-simbol-code="<?=$arResult["CODE"]?>" type="radio" data-color="<?=$color['UF_COLOR_CODE']?>" name="confColor" value="<?=$color['UF_NAME']?>" data-free="<?=$color['UF_IS_FREE']?>" title="<?=$color['UF_NAME']?>">
								<span class="conf-widget__color-radiobox">
									<span style="background-color:<?=$color['UF_COLOR_CODE']?>"></span>
								</span>
							</label>
						<?}?>
					</div>
				<?}?>
				<div class="swiper conf-widget__swiper margin_b_s">
					<div class="swiper-wrapper">
						<div class="swiper-slide conf-widget__slide">
							<div class="conf-layers" id="layer-front">
								<img class="conf-layers__img-bg" src="<?=SITE_TEMPLATE_PATH?>/img/conf/transparent-bg.png" alt="Transparent background">

								<?for ($i = 0; $i < count($arResult['PROPERTIES']['CONF_COLORED_BODY_FRONT']['DESCRIPTION']); $i++) {?>
									<img class="conf-layers__img" src="<?=CFile::GetPath($arResult['PROPERTIES']['CONF_COLORED_BODY_FRONT']['VALUE'][$i])?>" data-color-body="<?=$arResult['PROPERTIES']['CONF_COLORED_BODY_FRONT']['DESCRIPTION'][$i]?>" data-name="color" alt="<?=$arResult['PROPERTIES']['CONF_COLORED_BODY_FRONT']['DESCRIPTION'][$i]?>">
								<?}?>
								
								<?for ($i = 0; $i < count($arResult['CONF_MODULES']); $i++) {?>
									<?for ($j = 0; $j < count($arResult['CONF_MODULES'][$i]["UF_IMAGE"]); $j++) {?>
										<img class="conf-layers__img" data-specification="modules-img" data-hide="<?=$arResult['CONF_MODULES'][$i]["UF_HIDDEN"]?>" src="<?=$arResult['CONF_MODULES'][$i]["UF_IMAGE"][$j]?>" style="<?echo ($arResult['CONF_MODULES'][$i]["UF_ZINDEX"]) ? "z-index:".$arResult['CONF_MODULES'][$i]["UF_ZINDEX"].";" : "";?>opacity:0;" data-id-modul="<?=$arResult['CONF_MODULES'][$i]["UF_XML_ID"]?>" data-name-modul="<?=$arResult['CONF_MODULES'][$i]["UF_NAME"]?>" data-modul-binding="<?=$arResult['CONF_MODULES'][$i]["UF_IMG_DESCRIPTION"][$j]?>" data-active="" alt="<?=$arResult['CONF_MODULES'][$i]["UF_NAME"]?>">
									<?}?>
								<?}?>
							</div>
						</div>
						<?if (is_array($arResult['PROPERTIES']['CONF_COLORED_BODY_BACK']['VALUE'])) {?>
							<div class="swiper-slide conf-widget__slide">
								<div class="conf-layers">
									<img class="conf-layers__img-bg" src="<?=SITE_TEMPLATE_PATH?>/img/conf/transparent-bg.png" alt="Transparent background">

									<?for ($i = 0; $i < count($arResult['PROPERTIES']['CONF_COLORED_BODY_BACK']['DESCRIPTION']); $i++) {?>
										<img class="conf-layers__img" src="<?=CFile::GetPath($arResult['PROPERTIES']['CONF_COLORED_BODY_BACK']['VALUE'][$i])?>" data-color-body="<?=$arResult['PROPERTIES']['CONF_COLORED_BODY_BACK']['DESCRIPTION'][$i]?>" data-name="color" alt="<?=$arResult['PROPERTIES']['CONF_COLORED_BODY_FRONT']['DESCRIPTION'][$i]?>">
									<?}?>

									<?for ($i = 0; $i < count($arResult['CONF_MODULES']); $i++) {?>
										<?for ($j = 0; $j < count($arResult['CONF_MODULES'][$i]["UF_IMAGE_BACK"]); $j++) {?>
											<img class="conf-layers__img" data-specification="modules-img" data-hide="<?=$arResult['CONF_MODULES'][$i]["UF_HIDDEN"]?>" src="<?=$arResult['CONF_MODULES'][$i]["UF_IMAGE_BACK"][$j]?>" style="<?echo ($arResult['CONF_MODULES'][$i]["UF_ZINDEX_BACK"]) ? "z-index:".$arResult['CONF_MODULES'][$i]["UF_ZINDEX_BACK"].";" : "";?>opacity:0;" data-id-modul="<?=$arResult['CONF_MODULES'][$i]["UF_XML_ID"]?>" data-name-modul="<?=$arResult['CONF_MODULES'][$i]["UF_NAME"]?>" data-modul-binding="<?=$arResult['CONF_MODULES'][$i]["UF_IMG_DESCRIPTION_BACK"][$j]?>" alt="<?=$arResult['CONF_MODULES'][$i]["UF_NAME"]?>">
										<?}?>
									<?}?>
								</div>
							</div>
						<?}?>
					</div>
				</div>
				<?if (is_array($arResult['PROPERTIES']['CONF_COLORED_BODY_BACK']['VALUE'])) {?>
					<div class="arrows conf-widget__arrows">
						<button class="conf-widget__arrows-prev arrows__btn"><img class="arrows__img" src="<?=SITE_TEMPLATE_PATH?>/img/arrow-prev.svg" alt="Prev"></button>
						<button class="conf-widget__arrows-next arrows__btn"><img class="arrows__img" src="<?=SITE_TEMPLATE_PATH?>/img/arrow-next.svg" alt="Next"></button>
					</div>
				<?}?>
			</div>
			<div class="conf-widget__options">
				<?foreach ($arResult['CONF_MODULES'] as $put_dopmodules) {?>
					<?$mods_name = '';
					for ($i = 0; $i < count($arResult["MODEL"][$arResult["ID"]]); $i++) {
						if ($arResult["MODEL"][$arResult["ID"]][$i]["ID"] == $put_dopmodules["UF_HL_LINK_MODIFICATIONS"]) {
							$mods_name = $arResult["MODEL"][$arResult["ID"]][$i]["UF_NAME"];
						}
					}?>
					<label class="conf-widget__options-item<?if($put_dopmodules['UF_THUMBNAIL'] > 0):?> conf-widget__options-item_type_with-img<?endif?>" data-modul-binding="" data-sim-code="<?=$put_dopmodules["UF_CODE"]?>" data-id-modul="<?=$put_dopmodules['UF_XML_ID']?>" data-mods-name="<?=$mods_name?>" data-name="<?=$put_dopmodules['UF_NAME']?>" <?if ($put_dopmodules["UF_BLOCKED"] == 1 && $put_dopmodules["UF_CHECKED"] == 1) echo "data-default='default'";?>>
						<input class="checkbox__input" <?if ($put_dopmodules["UF_BLOCKED"] == 1 && $put_dopmodules["UF_CHECKED"] == 1) echo "data-default='default'";?> data-block-mods="<?=$put_dopmodules["UF_ALL_MODS_BLOCK"]?>" data-blocked-mods="<?=$put_dopmodules["UF_BLOCKADE"]?>" data-hide="<?=$put_dopmodules["UF_HIDDING_SHOWING"]?>" data-id="<?=$put_dopmodules['UF_XML_ID']?>" data-snap="<?=$put_dopmodules['UF_SNAP_MODUL']?>" data-simbol-code="<?=$arResult["CODE"]?>" type="checkbox" name="<?=$put_dopmodules['UF_NAME']?>" <?echo ($put_dopmodules['UF_BLOCKED'] == 1) ? 'disabled' : '';?> <?echo ($put_dopmodules['UF_CHECKED'] == 1) ? 'checked' : '';?>>
						<span class="checkbox__container">
							<?if($put_dopmodules['UF_THUMBNAIL'] > 0):?>
							<span class="checkbox__img-container">
								<img class="checkbox__img" src="<?=CFile::GetPath($put_dopmodules['UF_THUMBNAIL'])?>" alt="<?=$put_dopmodules['UF_NAME']?>">
							</span>
							<?endif?>
							<span class="checkbox"></span>
							<span class="checkbox__text"><span><?=$put_dopmodules['UF_NAME']?> </span><?if (!empty($put_dopmodules['UF_DESCRIPTION'])) {?><span class="checkbox__text-clarification"><?=$put_dopmodules['UF_DESCRIPTION']?></span><?}?></span>
						</span>
					</label>
				<?}?>
			</div>
		</div>
		<div class="conf-widget__total">
			<div class="conf-numbers conf-numbers_place_conf-widget">
				<div class="conf-widget__btn-container">
					<button class="btn btn_color_green" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Buy <?=$arResult['PROPERTIES']['M_SHORT_NAME']['VALUE']?> (configured)', 'action': 'atv-conf-model-page'})">Buy</button>
				</div>
			</div>
		</div>
	</div>
</div>