<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<?foreach ($arResult['ITEMS'] as $key => $item):?>
<?if($item['PROPERTIES']['WAREHOUSE']['VALUE'] == 'Y'):?>
<li><?=$item['DISPLAY_PROPERTIES']['DM_ADRES']['VALUE']?></li>
<?endif?>
<?endforeach?>