<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main;

$this->setFrameMode(true);

/* echo '<pre>'; print_r($arResult['ITEM']); echo '</pre>'; */

?>



	<tr class="spec-table__line">
		<td>
			<span class="spec-table__name">
				<span class="spec-table__name-desktop"><?=$arResult['ITEM']['NAME']?></span>
				<span class="spec-table__name-mobile"><?=preg_replace('/.*\s/', '', $arResult['ITEM']['NAME']);?></span>
			</span>
			<div class="spec-table__img-container">
				<img class="spec-table__img" src="<?=$arResult['ITEM']['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['ITEM']['NAME']?>">
			</div>
		</td>
		<td class="spec-table__char-value spec-table__char-value_style_border spec-table__char-value_no-wrap"><?=$arResult['ITEM']['DISPLAY_PROPERTIES']['LENGTH']['VALUE'];?>&nbsp;x&nbsp;<?=$arResult['ITEM']['DISPLAY_PROPERTIES']['WIDTH']['VALUE']; ?>&nbsp;x&nbsp;<?=$arResult['ITEM']['DISPLAY_PROPERTIES']['HEIGHT']['VALUE']; ?></td>
		<td class="spec-table__char-value spec-table__char-value_style_border"><?=$arResult['ITEM']['DISPLAY_PROPERTIES']['CAPACITY']['VALUE']?></td>
		<td class="spec-table__char-value spec-table__char-value_style_border"><?=$arResult['ITEM']['DISPLAY_PROPERTIES']['WEIGHT']['VALUE']?></td>
		<td class="spec-table__final-price-value"><?=$arResult['ITEM']['ITEM_PRICES'][0]['PRICE'];?></td>
	</tr>