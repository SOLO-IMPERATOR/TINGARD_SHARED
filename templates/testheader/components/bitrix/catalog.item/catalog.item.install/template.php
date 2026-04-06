<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main;

$this->setFrameMode(true);

/* echo '<pre>'; print_r($arResult['ITEM']); echo '</pre>';
 */
?>

	<tr class="install-table__line">
		<td class="install-table__name"><?=$arResult['ITEM']['NAME']?></td>
		<td class="install-table__value install-table__value_type_dimensions"><?= number_format((int)$arResult['ITEM']['DISPLAY_PROPERTIES']['LENGTH']['VALUE'] / 1000, 1, ',', ''); ?>x<?= number_format((int)$arResult['ITEM']['DISPLAY_PROPERTIES']['WIDTH']['VALUE'] / 1000, 1, ',', ''); ?>x<?= number_format((int)$arResult['ITEM']['DISPLAY_PROPERTIES']['HEIGHT']['VALUE'] / 1000, 1, ',', ''); ?></td>
		<td class="install-table__value install-table__value_type_capacity"><?=$arResult['ITEM']['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?></td>
		<td class="install-table__value install-table__value_type_install-price">от 167 000₽</td>
		<td class="install-table__value install-table__value_type_total-price">от 170 000₽</td>
	</tr>
