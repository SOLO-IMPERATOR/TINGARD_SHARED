<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();?>
<?if($arResult['NavPageCount'] > 1):?>
	<?if ($arResult['NavPageNomer'] + 1 <= $arResult['nEndPage']):?>
	<?$url = $arResult['sUrlPathParams'] . 'PAGEN_' . $arResult['NavNum'] . '=' . ($arResult['NavPageNomer'] + 1);?>
	<div class="ajax-btn-container">
		<button class="ajax-btn btn btn_type_default" type="button" data-url="<?=$url?>">Показать ещё</button>
	</div>
	<?endif?>
<?endif?>