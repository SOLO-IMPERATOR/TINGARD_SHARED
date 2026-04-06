<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();?>
<?if($arResult['NavPageCount'] > 1):?>
	<?if ($arResult['NavPageNomer'] + 1 <= $arResult['nEndPage']):?>
	<?$url = $arResult['sUrlPathParams'] . 'PAGEN_' . $arResult['NavNum'] . '=' . ($arResult['NavPageNomer'] + 1);?>
	<div class="ajax-btn-container">
		<button class="ajax-btn btn btn_color_green" type="button" data-url="<?=$url?>">Show more</button>
	</div>
	<?endif?>
<?endif?>