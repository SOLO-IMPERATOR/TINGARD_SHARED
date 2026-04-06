<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);

/* echo '<pre>'; print_r($arResult); echo '</pre>'; */

/* echo str_contains($arResult['FILTER_URL'], '/filter/clear/apply/'); */

?>

<div class="smart-filter">


		<div class="smart-filter-title">
			<div class="smart-filter-title__img-container">
				<svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line x1="14.022" y1="10.75" x2="23.897" y2="10.75" stroke="black" stroke-width="2"/>
					<line x1="6.33447" y1="10.75" x2="9.70947" y2="10.75" stroke="black" stroke-width="2"/>
					<circle cx="11.772" cy="10.8125" r="2.5" stroke="black" stroke-width="2"/>
					<line x1="16.2095" y1="19.5625" x2="6.33447" y2="19.5625" stroke="black" stroke-width="2"/>
					<line x1="23.897" y1="19.5625" x2="20.522" y2="19.5625" stroke="black" stroke-width="2"/>
					<circle cx="18.4595" cy="19.5" r="2.5" transform="rotate(-180 18.4595 19.5)" stroke="black" stroke-width="2"/>
				</svg>
			</div>
			<div class="smart-filter-title__name">Фильтр</div>
			<div class="smart-filter-title__btn-container">
				<span class="smart-filter-title__btn smart-filter-title__btn_action_show">Развернуть</span>
				<span class="smart-filter-title__btn smart-filter-title__btn_action_hide">Свернуть</span>
			</div>
		</div>

		<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smart-filter__form">

			<?foreach($arResult["HIDDEN"] as $arItem):?>
				<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
			<?endforeach;?>

			<div class="row">
				<?foreach($arResult["ITEMS"] as $key=>$arItem)//prices
				{
					$key = $arItem["ENCODED_ID"];
					if(isset($arItem["PRICE"])):
						if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
							continue;

						$step_num = 4;
						$step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
						$prices = array();
						if (Bitrix\Main\Loader::includeModule("currency"))
						{
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
							}
							$prices[$step_num] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
						}
						else
						{
							$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $precision, ".", "");
							}
							$prices[$step_num] = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
						}
						?>

						<div class="smart-filter__item">

							<div class="smart-filter__item-name"><?=$arItem['NAME']?></div>

							<ul class="smart-filter__input-list">

								<li class="smart-filter__input-container">
									<span class="smart-filter__input-before">от</span>
									<input class="smart-filter__input" type="number" name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" id="<?=$arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" value="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"]?>" size="5" placeholder="<?=$prices[0]?>" onkeyup="smartFilter.keyup(this)">
									<span class="smart-filter__input-after">руб.</span>
								</li>

								<li class="smart-filter__input-container">
								<span class="smart-filter__input-before">до</span>
									<input class="smart-filter__input" type="number" name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" id="<?=$arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" value="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"]?>" size="5" placeholder="<?=end($prices)?>" onkeyup="smartFilter.keyup(this)">
									<span class="smart-filter__input-after">руб.</span>
								</li>
							</ul>

						</div>
						<?

						$arJsParams = array(
							"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
							"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
							"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
							"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
							"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
							"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
							"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
							"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
							"precision" => $precision,
						);
						?>
						<script type="text/javascript">
							BX.ready(function(){
								window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
							});
						</script>
					<?endif;
				}

				//not prices
				foreach($arResult["ITEMS"] as $key=>$arItem) {
					if (empty($arItem["VALUES"]) || isset($arItem["PRICE"]))
						continue;

					if ($arItem["DISPLAY_TYPE"] == "A" && ( $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0))
						continue;
					?>

					<div class="smart-filter__item">

						<!-- <span class="smart-filter-container-modef"></span> -->

						<div class="smart-filter__item-name"><?=$arItem["NAME"]?></div>


						<ul class="smart-filter__checkbox-list">
							<?foreach($arItem["VALUES"] as $val => $ar):?>
							<li class="smart-filter__checkbox-item">
								<input type="checkbox" value="<?=$ar['HTML_VALUE']?>" name="<?=$ar['CONTROL_NAME']?>" id="<?=$ar['CONTROL_ID']?>" class="smart-filter__checkbox-input"<?=$ar['CHECKED']? ' checked': '' ?><?=$ar['DISABLED'] ? ' disabled': ''?> onclick="smartFilter.click(this)">
								<label data-role="label_<?=$ar['CONTROL_ID']?>" class="smart-filter__checkbox-label" for="<?=$ar['CONTROL_ID']?>">
									<span class="smart-filter__checkbox-value"><?=$ar['VALUE']?><?if($arParams['DISPLAY_ELEMENT_COUNT'] !== "N" && isset($ar['ELEMENT_COUNT'])):?></span><sup class="smart-filter__checkbox-count" data-role="count_<?=$ar['CONTROL_ID']?>"><?=$ar['ELEMENT_COUNT']?></sup><?endif?>
								</label>
							</li>
							<?endforeach;?>
						</ul>
					</div>
				<?
				}
				?>
			</div><!--//row-->

			<div class="smart-filter__result">
				<div class="smart-filter__result-count-container">
					<div class="smart-filter__result-count" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
						<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
					</div>
				</div>
				<div class="smart-filter__btn-container">
					<button class="btn btn_type_reset" type="submit" id="del_filter" name="del_filter">Сбросить</button>
					<button class="btn btn_type_default" type="submit" id="set_filter" name="set_filter">Показать</button>
				</div>
			</div>
			<?/* echo '<pre>'; print_r($arResult); echo '</pre>'; */?>
		</form>

</div>

<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>