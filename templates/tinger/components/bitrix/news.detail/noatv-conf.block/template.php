<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $USER;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss('/local/templates/tinger/css/components/configurator.css');
Asset::getInstance()->addCss('/local/templates/tinger/css/components/configurator-widget.css');
$this->setFrameMode(true);?>


<div id="equipment" class="conf-widget">
	<div class="conf-widget__packages-container">
		<div class="conf-widget__packages margin_b_s">
			<?foreach ($arResult["MODIFICATIONS"] as $set_modifications) {?>
				<label class="conf-widget__package">
					<input class="conf-widget__package-input" type="radio" data-model="<?=$set_modifications[0]?>" name="t-model" value="<?=$set_modifications[4]?>">
					<span class="conf-widget__package-radiobox">
						<span class="section-subtitle conf-widget__package-name"><?=$set_modifications[0]?></span>
						<span class="conf-widget__package-benefit"><?=number_format(preg_replace("/[^0-9]/", '', $set_modifications[4]), 0, ',', ' ')?> руб.</span>
					</span>
				</label>
			<?}?>
		</div>
	</div>
	<div class="conf-widget__visual margin_b_s">
		<div class="conf-widget__slider margin_b_m">
			<div class="conf-layers">
				<?foreach ($arResult["MODIFICATIONS"] as $set_img) {?>
					<img data-mods-name="<?=$set_img[0]?>" src="<?=$set_img[3]?>" alt="Изображение <?=$set_img[0]?>">
				<?}?>
			</div>
		</div>
	
		<div class="conf-widget__options">
			<table class="table">
				<tbody>
					<?foreach($arResult["MODIFICATIONS"] as $charsItems):?>
						<?foreach($charsItems[5] as $charsItem):?>
						<tr class="table__row" data-type="mods" data-mods-name="<?=$charsItems[0]?>">
							<td class="table__name"><?=explode(' | ', $charsItem)[0]?></td>
							<td class="table__text"><?=explode(' | ', $charsItem)[1]?></td>
						</tr>
						<?endforeach?>
					<?endforeach?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="conf-widget__total">
		<div class="conf-widget__total-btn-container">
			<a class="conf-widget__total-btn btn btn_color_transparent-green" href="/configurator/">Перейти в конфигуратор</a>
		</div>
		<div class="conf-numbers conf-numbers_place_conf-widget">
			<p class="section-subtitle margin_b_m" data-standart-price="0">Итого: <?=$arResult["PROPERTIES"]["C_PRICE"]["VALUE"]?> руб.</p>
			<div class="conf-widget__btn-container">
				<button class="btn btn_color_green" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Купить <?=$arResult['PROPERTIES']['M_SHORT_NAME']['VALUE']?> (выбрана модификация)', 'action': 'package-conf-model-page'})">Купить</button>
			</div>
		</div>
	</div>
</div>