<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main;

$this->setFrameMode(true);

/* echo '<pre>'; print_r($arResult['ITEM']); echo '</pre>'; */

?>

<li class="manual__list-item">
	<div class="manual__img-container">
		<img class="manual__img" src="<?=$arResult['ITEM']['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['ITEM']['NAME']?>">
	</div>
	<div class="manual__name"><?=$arResult['ITEM']['NAME']?></div>
	<div class="manual__btn-container">
		<a class="manual__btn btn btn_color_yellow" href="<?=$arResult['ITEM']['MANUAL_FILE']?>" target="_blank">Скачать<span class="manual__btn-hidden-text"> инструкцию</span></a>
	</div>
</li>