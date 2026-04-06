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

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

$this->setFrameMode(true);
$ITEMS = $arResult["ITEMS"];
$zindex_front = 0;
$zindex_back = 0;
$modules_price_general = 0;
$mods_img = '';
?>



<section data-page="first-page" class="container margin_b_xl conf-preloader conf-preloader_active">
	<nav class="conf-nav margin_b_l">
		<ul class="conf-nav__list">
			<li class="conf-nav__item conf-nav__item_status_active">
				<a class="conf-nav__link" href="#"><span class="conf-nav__step">1</span> <span class="conf-nav__text">Выбор модели</span></a>
			</li>
			<li class="conf-nav__item">
				<a class="conf-nav__link" href="#"><span class="conf-nav__step">2</span> <span class="conf-nav__text">Выбор комплектации</span></a>
			</li>
			<li class="conf-nav__item">
				<a class="conf-nav__link" href="#"><span class="conf-nav__step">3</span> <span class="conf-nav__text">Выбор оборудования</span></a>
			</li>
			<li class="conf-nav__item">
				<a class="conf-nav__link" href="#"><span class="conf-nav__step">4</span> <span class="conf-nav__text">Условия приобретения</span></a>
			</li>
		</ul>
	</nav>
	<h2 class="section-title margin_b_m">Выберите модель</h2>
	<div class="conf-models margin_b_m">
		<ul class="conf-models__list">
			<? foreach ($ITEMS as $pet_productions) { ?>
			<?/*  if ($pet_productions['CODE'] !== 'tinger-dog'):  */?>
			<?if($pet_productions['ID'] != 1756):?>
			<li class="conf-models__item">
				<label class="model-card conf-models__radio" data-code-production="<?= $pet_productions["CODE"] ?>" data-name-production="<?= $pet_productions["NAME"] ?>" data-id-production="<?= $pet_productions["ID"] ?>">
				<input class="radio__input" type="radio" name="models" data-code-production="<?= $pet_productions["CODE"] ?>">
					<span class="radiobox__container">
						<span class="radiobox"></span>
						<span class="radiobox__text">Выбрать</span>
					</span>
					<img class="model-card__img" src="<?= $pet_productions["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $pet_productions["NAME"] ?>">
					<span class="model-card__name"><?= $pet_productions["PREVIEW_TEXT"] ?></span>
					<span class="model-card__price"><span class="model-card__price-tagline">Цена от</span> <?= $pet_productions["PROPERTIES"]["C_PRICE"]["VALUE"] ?> руб.</span>
				</label>
			</li>
			<?endif?>
			<?/*  endif  */?>
			<? } ?>
		</ul>
	</div>
	<button id="continue-btn-2" class="btn btn--green--fill w--100">Продолжить</button>
</section>

<? foreach ($ITEMS as $pet_model_data) { ?>
	<?if($pet_model_data['ID'] != 1756):?>
	<?
	// Взять модификации из блока
	if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
		$hlblock_modifications = HL\HighloadBlockTable::getById(9)->fetch();
		$entity_modifications = HL\HighloadBlockTable::compileEntity($hlblock_modifications);
		$entity_data_class_modifications = $entity_modifications->getDataClass();
		$rsData_modifications = $entity_data_class_modifications::getList(array(
			"select" => array("*"),
			"order" => array("ID" => "ASC"),
			"filter" => array()
		));

		while ($arData = $rsData_modifications->Fetch()) {
			foreach ($pet_model_data["DISPLAY_PROPERTIES"]["HL_MODS"]["VALUE"] as $get_modifications) {
				if ($get_modifications == $arData["UF_XML_ID"]) {
					$pet_model_data["MODIFICATIONS"][$pet_model_data["ID"]][] = [$arData["UF_NAME"], $arData["UF_PRICE"], $arData["ID"], CFile::GetPath($arData["UF_IMG"]), $arData["UF_NCREASEL"], $arData['UF_MODIFICATION_CHARS']];
				}
			}
		}
	}

	?>

	<section data-page="equipment" data-simbol-code="<?= $pet_model_data['CODE'] ?>" style="display:none;" class="container margin_b_xl">
		<nav class="conf-nav margin_b_l">
			<ul class="conf-nav__list">
				<li class="conf-nav__item conf-nav__item_status_success" data-block-id="first-page" data-model-name="">
					<a class="conf-nav__link" href="#"><span class="conf-nav__step">1</span> <span class="conf-nav__text">Выбор модели</span></a>
				</li>
				<li class="conf-nav__item conf-nav__item_status_active">
					<a class="conf-nav__link" href="#"><span class="conf-nav__step">2</span> <span class="conf-nav__text">Выбор комплектации</span></a>
				</li>
				<li class="conf-nav__item">
					<a class="conf-nav__link" href="#"><span class="conf-nav__step">3</span> <span class="conf-nav__text">Выбор оборудования</span></a>
				</li>
				<li class="conf-nav__item">
					<a class="conf-nav__link" href="#"><span class="conf-nav__step">4</span> <span class="conf-nav__text">Условия приобретения</span></a>
				</li>
			</ul>
		</nav>
		<h2 class="section-title margin_b_m">Выберите модификацию</h2>
		<div class="conf-modification margin_b_m">
			<div class="conf-modification__visual">
				<div class="conf-modification__choice">
					<label class="conf-modification__choice-item">
						<span class="section-subtitle margin_b_s">Модификация и двигатель</span>
						<select data-simbol-code="<?= $pet_model_data['CODE'] ?>" class="select" name="modification">
							<? for ($i = 0; $i < count($pet_model_data["MODIFICATIONS"][$pet_model_data["ID"]]); $i++) { ?>
								<option data-mods-name="<?= $pet_model_data["MODIFICATIONS"][$pet_model_data["ID"]][$i][0] ?>" data-mods-img="<?= $pet_model_data["MODIFICATIONS"][$pet_model_data["ID"]][$i][3] ?>" value="<?= $pet_model_data["MODIFICATIONS"][$pet_model_data["ID"]][$i][4] ?>"><?= $pet_model_data["MODIFICATIONS"][$pet_model_data["ID"]][$i][0] ?></option>
							<? } ?>
						</select>
					</label>
				</div>
				<div class="conf-modification__layers conf-layers">
					<img class="conf-layers__img-bg" src="/local/templates/tinger/img/conf/transparent-bg.png" alt="Прозрачный фон">

					<? foreach ($pet_model_data["MODIFICATIONS"][$pet_model_data["ID"]] as $set_mods_img) { ?>
						<img class="conf-layers__img conf-layers__img--base tr5-tank" data-mods-name="<?= $set_mods_img[0] ?>" src="<?= $set_mods_img[3] ?>" alt="<?= $set_mods_img[0] ?>">
					<? } ?>

				</div>
			</div>
			<div class="conf-modification__chars">
				<span class="section-subtitle margin_b_s">Характеристики</span>
				<table class="table margin_b_s">
					<?foreach($pet_model_data["MODIFICATIONS"][$pet_model_data["ID"]] as $charsItems):?>
						<?foreach($charsItems[5] as $charsItem):?>
						<tr class="table__row" data-type="mods" data-mods-name="<?=$charsItems[0]?>">
							<td class="table__name"><?=explode(' | ', $charsItem)[0]?></td>
							<td class="table__text"><?=explode(' | ', $charsItem)[1]?></td>
						</tr>
						<?endforeach?>
					<?endforeach?>
				</table>
				<p class="section-subtitle conf-total" data-modification-price="0" data-total-price="0">Итого: 0</p>
			</div>
		</div>
		<div class="btn__group">
			<button data-btn-specification="back-btn-1" class="btn btn--green--fill">Назад</button>
			<button data-btn-specification="continue-btn-3" data-simbol-code="<?= $pet_model_data['CODE'] ?>" class="btn btn--green--fill">Продолжить</button>
		</div>
	</section>
	<?endif?>
<? } ?>

<? foreach ($ITEMS as $get_model) { ?>
	<?if($get_model['ID'] != 1756):?>

	<? // получение значений модулей
	if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
		$hlblock   = HL\HighloadBlockTable::getById(4)->fetch();
		$entity = HL\HighloadBlockTable::compileEntity($hlblock);
		$entity_data_class = $entity->getDataClass();
		$rsData = $entity_data_class::getList(array(
			"select" => array("*"),
			"order" => array("UF_SORT" => "ASC"),
			"filter" => array()
		));

		while ($arData = $rsData->Fetch()) {
			foreach ($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['VALUE'] as $get_hb_el) {
				if ($get_hb_el == $arData['ID']) {
					$get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][] = $arData;
				}
			}
		}

		for ($i = 0; $i < count($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR']); $i++) {
			for ($j = 0; $j < count($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE"]); $j++) {
				$get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE"][$j] = CFile::GetPath($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE"][$j]);
			}
			for ($j = 0; $j < count($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE_BACK"]); $j++) {
				$get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE_BACK"][$j] = CFile::GetPath($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$i]["UF_IMAGE_BACK"][$j]);
			}
		}
	} ?>

	<?
	// получение пакетов

	if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
		$hlblock_packs = HL\HighloadBlockTable::getById(8)->fetch();
		$entity_packs = HL\HighloadBlockTable::compileEntity($hlblock_packs);
		$entity_data_class_packs = $entity_packs->getDataClass();
		$rsData_packs = $entity_data_class_packs::getList(array(
			"select" => array("*"),
			"order" => array("UF_SORT" => "ASC"),
			"filter" => array()
		));

		while ($arData = $rsData_packs->Fetch()) {
			foreach ($get_model["DISPLAY_PROPERTIES"]["HL_PACKS"]["VALUE"] as $get_hb_el_packs) {
				if ($get_hb_el_packs == $arData['UF_XML_ID']) {
					$get_model["PACKS"][$get_model["ID"]][] = $arData;
				}
			}
		}
	}

	// получение моделей

	if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
		$hlblock_model = HL\HighloadBlockTable::getById(9)->fetch();
		$entity_model = HL\HighloadBlockTable::compileEntity($hlblock_model);
		$entity_data_class_model = $entity_model->getDataClass();
		$rsData_model = $entity_data_class_model::getList(array(
			"select" => array("*"),
			"order" => array("ID" => "ASC"),
			"filter" => array()
		));

		while ($arData = $rsData_model->Fetch()) {
			foreach ($get_model['DISPLAY_PROPERTIES']['HL_MODS']["VALUE"] as $get_hb_el_model) {

				if ($get_hb_el_model == $arData['UF_XML_ID']) {
					$get_model["MODEL"][$get_model["ID"]][] = $arData;
				}
			}
		}
	}
	?>

	<section data-page="conditions" data-simbol-code="<?= $get_model["CODE"] ?>" data-mods-name="" data-mods-price="" style="display:none;" class="container margin_b_xl">
		<nav class="conf-nav margin_b_l">
			<ul class="conf-nav__list">
				<li class="conf-nav__item conf-nav__item_status_success" data-block-id="first-page" data-model-name="">
					<a class="conf-nav__link" href="#"><span class="conf-nav__step">1</span> <span class="conf-nav__text">Выбор модели</span></a>
				</li>
				<li class="conf-nav__item conf-nav__item_status_success" data-block-id="equipment" data-model-name="<?= $get_model["CODE"] ?>">
					<a class="conf-nav__link" href="#"><span class="conf-nav__step">2</span> <span class="conf-nav__text">Выбор комплектации</span></a>
				</li>
				<li class="conf-nav__item conf-nav__item_status_active">
					<a class="conf-nav__link" href="#"><span class="conf-nav__step">3</span> <span class="conf-nav__text">Выбор оборудования</span></a>
				</li>
				<li class="conf-nav__item">
					<a class="conf-nav__link" href="#"><span class="conf-nav__step">4</span> <span class="conf-nav__text">Условия приобретения</span></a>
				</li>
			</ul>
		</nav>
		<h2 class="section-title margin_b_m">Выберите оборудование</h2>
		<div class="conditions__short-name" style="display:none;"><?= $get_model['DISPLAY_PROPERTIES']['M_SHORT_NAME']['VALUE'] ?></div>
		<div class="conf-widget margin_b_m">

			<? if ($get_model['DISPLAY_PROPERTIES']['C_ACT_PACKS']['VALUE'] == 'Y') { ?>
				<div class="conf-widget__packages-container">
					<div class="conf-widget__packages margin_b_s">
						<? for ($i = 0; $i < count($get_model["PACKS"][$get_model["ID"]]); $i++) {
							$price_advantage = 0;
							$price_advantage_sale = 0;
							$modul_collection = '';
							$mods_name = array();
							$mod_pack = array();
							$active_modification;
							$modelPrice = $get_model['DISPLAY_PROPERTIES']['C_PRICE']['VALUE'];

							for ($j = 0; $j <= count($get_model["PACKS"][$get_model["ID"]][$i]["UF_MODS"]); $j++) {
								for ($k = 0; $k < count($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR']); $k++) {
									if ($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$k]["ID"] == $get_model["PACKS"][$get_model["ID"]][$i]["UF_MODS"][$j]) {
										$price_advantage += preg_replace("/[^0-9]/", '', $get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$k]["UF_PRICE"]);
										$modul_collection .= ',' . $get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'][$k]["ID"];
									}
								}
							}

							foreach ($get_model["MODEL"][$get_model["ID"]] as $get_active_modification) {
								if ($get_active_modification["ID"] == $get_model["PACKS"][$get_model["ID"]][$i]["UF_MODEL"]) {
									$active_modification = $get_active_modification["UF_NAME"];
									$modelPrice = $get_active_modification["UF_NCREASEL"];
								}
							}

							$price_advantage += preg_replace("/[^0-9]/", '', $modelPrice);

							$price_advantage = $price_advantage - preg_replace("/[^0-9]/", '', $get_model["PACKS"][$get_model["ID"]][$i]["UF_PRICE"]);
							

							if ($price_advantage <= 0) {
								$price_advantage = 0;
							}
							$price_advantage = number_format($price_advantage, 0, ',', ' ');

							if (isset($get_model["PACKS"][$get_model["ID"]][$i]["UF_SALE_PRICE"])) {
								$price_advantage_sale = $get_model["PACKS"][$get_model["ID"]][$i]["UF_PRICE"] - $get_model["PACKS"][$get_model["ID"]][$i]["UF_SALE_PRICE"];

								$price_advantage_sale = number_format($price_advantage_sale, 0, ',', ' ');
							}
							
						?>

							<label class="conf-widget__package" data-modul-name="<?= $active_modification ?>" data-modul-collection="<?= $modul_collection ?>" data-simbol-code="<?= $get_model["CODE"] ?>">
								<input class="conf-widget__package-input" data-mods-name="" data-modul-collection="<?= $modul_collection ?>" data-simbol-code="<?= $get_model["CODE"] ?>" data-price-advantage="<?= preg_replace("/[^0-9]/", '', $price_advantage) ?>" data-price-pack="<?= $get_model["PACKS"][$get_model["ID"]][$i]["UF_PRICE"] ?>" data-sale-price-pack="<?= $get_model["PACKS"][$get_model["ID"]][$i]["UF_SALE_PRICE"] ?>" type="radio" onMouseDown="this.isChecked=this.checked;" onClick="this.checked=!this.isChecked;" name="package" value="0">
								<span class="conf-widget__package-radiobox">
									<span class="section-subtitle conf-widget__package-name"><?= $get_model["PACKS"][$get_model["ID"]][$i]["UF_NAME"] ?></span>
									<span class="conf-widget__package-benefit" data-price-pack="<?= $get_model["PACKS"][$get_model["ID"]][$i]["UF_PRICE"] ?>">Выгода <?= $price_advantage ?> руб.</span>
								</span>
							</label>
						<? } ?>

					</div>
				</div>
			<? } ?>

			<div class="conf-widget__visual margin_b_s">
				<div class="conf-widget__slider margin_b_m">
					<? if (!empty($get_model['DISPLAY_PROPERTIES']['CONF_COLOR_MODEL']['VALUE'])) { ?>
						<div class="conf-widget__color-selected">
							<span class="conf-widget__color-tagline">Выбранный цвет:</span>
							<span class="conf-widget__color"></span>
						</div>
						<div class="conf-widget__color-list margin_b_s">
							<? for ($i = 0; $i < count($get_model['DISPLAY_PROPERTIES']['CONF_COLOR_MODEL']['VALUE']); $i++) { ?>
								<?
								$color = [];
								
								foreach ($arResult["COLORS"] as $set_color) {
									if (!empty($set_color) && $set_color["UF_XML_ID"] == $get_model['DISPLAY_PROPERTIES']['CONF_COLOR_MODEL']['VALUE'][$i]) {
										$color = $set_color;
									}
								}
								?>
								<label class="conf-widget__color-item">
									<input class="radio__input" data-simbol-code="<?= $get_model["CODE"] ?>" type="radio" data-color="<?= $color['UF_XML_ID'] ?>" name="confColor" value="<?= $color['UF_NAME'] ?>" data-free="<?= $color['UF_IS_FREE'] ?>">
									<span class="conf-widget__color-radiobox">
										<span style="background-color:<?= $color['UF_XML_ID'] ?>"></span>
									</span>
								</label>
							<? } ?>
						</div>
					<? } ?>

					<div class="swiper conf-widget__swiper margin_b_s">
						<div class="swiper-wrapper">
							<div class="swiper-slide conf-widget__slide">
								<div class="conf-layers" data-side-img="layer-front">
									<img class="conf-layers__img-bg" src="/local/templates/tinger/img/conf/transparent-bg.png" alt="Прозрачный фон">

									<? for ($i = 0; $i < count($get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_FRONT']['DESCRIPTION']); $i++) { ?>
										<img class="conf-layers__img" src="<?= $get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_FRONT']['FILE_VALUE'][$i]['SRC'] ?>" data-color-body="<?= $get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_FRONT']['DESCRIPTION'][$i] ?>" data-name="color" alt="<?= $get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_FRONT']['DESCRIPTION'][$i] ?>">
									<? } ?>

									<? for ($i = 0; $i < count($get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR']); $i++) { ?>
										<? for ($j = 0; $j < count($get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_IMAGE"]); $j++) { ?>
											<img class="conf-layers__img" data-specification="modules-img" data-hide="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_HIDDEN"] ?>" src="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_IMAGE"][$j] ?>" style="<? echo ($get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_ZINDEX"]) ? "z-index:" . $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_ZINDEX"] : "z-index:0"; ?>;opacity:-1;" data-id-modul="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_XML_ID"] ?>" data-name-modul="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_NAME"] ?>" data-modul-binding="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_IMG_DESCRIPTION"][$j] ?>" data-active="" alt="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_NAME"] ?>">
										<? } ?>
									<? } ?>
								</div>
							</div>
							<? if (!empty($get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_BACK']['FILE_VALUE'])) { ?>
								<div class="swiper-slide conf-widget__slide">
									<div class="conf-layers" data-side-img="layer-back">
										<img class="conf-layers__img-bg" src="/local/templates/tinger/img/conf/transparent-bg.png" alt="Прозрачный фон">

										<? for ($i = 0; $i < count($get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_BACK']['DESCRIPTION']); $i++) { ?>
											<img class="conf-layers__img" src="<?= $get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_BACK']['FILE_VALUE'][$i]['SRC'] ?>" data-color-body="<?= $get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_BACK']['DESCRIPTION'][$i] ?>" data-name="color" alt="<?= $get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_BACK']['DESCRIPTION'][$i] ?>">
										<? } ?>

										<? for ($i = 0; $i < count($get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR']); $i++) { ?>
											<? for ($j = 0; $j < count($get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_IMAGE_BACK"]); $j++) { ?>
												<img class="conf-layers__img" data-specification="modules-img" data-hide="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_HIDDEN"] ?>" src="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_IMAGE_BACK"][$j] ?>" style="<? echo ($get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_ZINDEX_BACK"]) ? "z-index:" . $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_ZINDEX_BACK"] : "z-index:-1"; ?>;opacity:0;" data-id-modul="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_XML_ID"] ?>" data-name-modul="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_NAME"] ?>" data-modul-binding="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_IMG_DESCRIPTION_BACK"][$j] ?>" alt="<?= $get_model["DISPLAY_PROPERTIES"]['CONF_MODULE']['PAR'][$i]["UF_NAME"] ?>">
											<? } ?>
										<? } ?>
									</div>
								</div>
							<? } ?>
						</div>
					</div>
					<? if (!empty($get_model['DISPLAY_PROPERTIES']['CONF_COLORED_BODY_BACK']['FILE_VALUE'])) { ?>
						<div class="arrows conf-widget__arrows">
							<button class="conf-widget__arrows-prev arrows__btn"><img class="arrows__img" src="/local/templates/tinger/img/arrow-prev.svg" alt="Стрелка назад"></button>
							<button class="conf-widget__arrows-next arrows__btn"><img class="arrows__img" src="/local/templates/tinger/img/arrow-next.svg" alt="Стрелка вперёд"></button>
						</div>
					<? } ?>
				</div>
				<div class="conf-widget__options">

					<? foreach ($get_model['DISPLAY_PROPERTIES']['CONF_MODULE']['PAR'] as $put_dopmodules) { ?>

						<? $mods_name = '';
						for ($i = 0; $i < count($get_model["MODEL"][$get_model["ID"]]); $i++) {
							if ($get_model["MODEL"][$get_model["ID"]][$i]["ID"] == $put_dopmodules["UF_HL_LINK_MODIFICATIONS"]) {
								$mods_name = $get_model["MODEL"][$get_model["ID"]][$i]["UF_NAME"];
							}
						} ?>
						<label class="conf-widget__options-item" data-modul-binding="" data-sim-code="<?= $put_dopmodules["UF_CODE"] ?>" data-id-modul="<?= $put_dopmodules['UF_XML_ID'] ?>" data-mods-name="<?= $mods_name ?>" data-name="<?= $put_dopmodules['UF_NAME'] ?>" data-price="<?= $put_dopmodules['UF_PRICE'] ?>" <? if ($put_dopmodules["UF_BLOCKED"] == 1 && $put_dopmodules["UF_CHECKED"] == 1) echo "data-default='default'"; ?>>
							<input class="checkbox__input <?= $put_dopmodules["UF_SHUTDOWN"] ?>" <? if ($put_dopmodules["UF_BLOCKED"] == 1 && $put_dopmodules["UF_CHECKED"] == 1) echo "data-default='default'"; ?> data-disable-mod="<?= $put_dopmodules["UF_DISABLE"] ?>" data-block-mods="<?= $put_dopmodules["UF_ALL_MODS_BLOCK"] ?>" data-blocked-mods="<?= $put_dopmodules["UF_BLOCKADE"] ?>" data-hide="<?= $put_dopmodules["UF_HIDDING_SHOWING"] ?>" data-id="<?= $put_dopmodules['UF_XML_ID'] ?>" data-snap="<?= $put_dopmodules['UF_SNAP_MODUL'] ?>" data-simbol-code="<?= $get_model["CODE"] ?>" type="checkbox" name="<?= $put_dopmodules['UF_NAME'] ?>" <? echo ($put_dopmodules['UF_BLOCKED'] == 1) ? 'disabled' : ''; ?> <? echo ($put_dopmodules['UF_CHECKED'] == 1) ? 'checked' : ''; ?>>
							<span class="checkbox__container">
								<span class="checkbox"></span>
								<span class="checkbox__text"><span><?= $put_dopmodules['UF_NAME'] ?> </span><? if (!empty($put_dopmodules['UF_DESCRIPTION'])) { ?><span class="checkbox__text-clarification"><?= $put_dopmodules['UF_DESCRIPTION'] ?></span><? } ?></span>
								<span class="checkbox__price"><? echo ($put_dopmodules['UF_PRICE'] != '—') ? number_format(preg_replace("/[^0-9]/", '', $put_dopmodules['UF_PRICE']), 0, ',', ' ') . " руб." : $put_dopmodules['UF_PRICE'] ?> </span>
							</span>
						</label>

					<? } ?>

				</div>
			</div>
			<div class="conf-widget__total">
				<div class="conf-numbers conf-numbers_place_conf-widget">
					<p class="conf-numbers__item margin_b_s">
						<span class="conf-numbers__tagline">Дополнительное оборудование: </span>
						<span class="conf-numbers__price" data-mod-price="0">0 руб.</span>
					</p>
					<p class="section-subtitle total-price-m" data-entity="total" data-modification-price="0" data-pack-price="" data-total-price="0">Итого: 0</p>
				</div>
			</div>
		</div>
		<div class="btn__group btn__group--configurator">
			<button data-btn-specification="back-btn-2" data-simbol-code="<?= $get_model["CODE"] ?>" class="btn btn--green--fill">Назад</button>
			<button data-btn-specification="continue-btn-4" data-simbol-code="<?= $get_model["CODE"] ?>" class="btn btn--green--fill">Продолжить</button>
		</div>
	</section>
	<?endif?>
<? } ?>

<section data-page="facilities" data-simbol-code="end_block" style="display:none;" class="conf-total container">
	<nav class="conf-nav margin_b_m">
		<ul class="conf-nav__list">
			<li class="conf-nav__item conf-nav__item_status_success" data-block-id="first-page" data-model-name="">
				<a class="conf-nav__link" href="#"><span class="conf-nav__step">1</span> <span class="conf-nav__text">Выбор модели</span></a>
			</li>
			<li class="conf-nav__item conf-nav__item_status_success" data-block-id="equipment" data-model-name="">
				<a class="conf-nav__link" href="#"><span class="conf-nav__step">2</span> <span class="conf-nav__text">Выбор комплектации</span></a>
			</li>
			<li class="conf-nav__item conf-nav__item_status_success" data-block-id="conditions" data-model-name="">
				<a class="conf-nav__link" href="#"><span class="conf-nav__step">3</span> <span class="conf-nav__text">Выбор оборудования</span></a>
			</li>
			<li class="conf-nav__item conf-nav__item_status_active">
				<a class="conf-nav__link" href="#"><span class="conf-nav__step">4</span> <span class="conf-nav__text">Условия приобретения</span></a>
			</li>
		</ul>
	</nav>

	<h2 class="section-title margin_b_m" id="facilities__header-name"></h2>

	<div style="display:none;" id="active-pack"></div>
	<div style="display:none;" id="active-color"></div>
	<div style="display:none" id="active-modification"></div>

	<div class="conf-total__visual margin_b_l">

		<div class="conf-layers"></div>

		<div class="conf-numbers">
			<p class="conf-numbers__item">
				<span class="conf-numbers__tagline">Базовая цена модели: </span>
				<span class="conf-numbers__price" id="base-price-end"><span></span> руб.</span>
			</p>
			<p class="conf-numbers__item">
				<span class="conf-numbers__tagline">Ваша выгода: </span>
				<span class="conf-numbers__price" id="profit-price-end"><span></span> руб.</span>
			</p>
			<p class="conf-numbers__item margin_b_s">
				<span class="conf-numbers__tagline">Дополнительное оборудование: </span>
				<span class="conf-numbers__price" id="modul-price-end"><span></span> руб.</span>
			</p>
			<p class="section-subtitle margin_b_m" id="total-price-end">Итого: <span>0</span> руб.</p>

			<button class="btn btn_color_green" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Сконфигурированный вездеход (заявка)', 'action': 'get-conf-data'})">Отправить заявку</button>
		</div>
	</div>

	<canvas id="conf-img" style="width:100%;height:100%;display:none;"></canvas>

	<div id="code-canvas" style="display:none"></div>

	<div class="conf-total__modification margin_b_xl">
		<div class="conf-total__btn-container margin_b_l">
			<p class="section-subtitle margin_b_m">Ваша модификация</p>
			<button class="btn btn_color_green" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Сконфигурированный вездеход (найти дилера)', 'action': 'get-conf-data'})">Найти дилера</button>
			<button class="btn btn_color_green" type="button" data-action="download-pdf" data-download-option="default">Скачать PDF</button>
			<?if ($_GET['mode'] === 'edit'):?>
				<button class="btn btn_color_green" type="button" data-action="download-pdf" data-download-option="tehs">PDF с подписью (ООО ТехС)</button>
				<button class="btn btn_color_green" type="button" data-action="download-pdf" data-download-option="mehanika">PDF с подписью (ООО Механика)</button>
			<?endif?>
			<button class="btn btn_color_green" type="button" onclick="openModal('default-email', {'crm-entity': 'lead', 'crm-title': 'Сконфигурированный вездеход (клиент отправил комплектацию себе на email)', 'action': 'get-conf-data'}, 'Укажите данные для отправки собранной комплектации')">Отправить комплектацию на email</button>
		</div>

		<div class="conf-total__tabs">
			<ul class="tab-head">
				<li class="tab-title section-subtitle margin_b_m tab-title_active">Характеристики</li>
				<li class="tab-title section-subtitle margin_b_m">Комплектация</li>
			</ul>
			<div class="tab-body">
				<div class="tab-content tab-content_active">
					<table class="table" id="facilities__characteristics">
						<tbody></tbody>
					</table>
				</div>
				<div class="tab-content" id="facilities__modules">
					<ul class="conf-total__list"></ul>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="/local/templates/tinger/js/pdfmaker/pdfmake.js?v=8"></script>
<script src="/local/templates/tinger/js/pdfmaker/vfs_fonts.js?v=8"></script>
<script src="/local/templates/tinger/js/pdf.js?v=8"></script>