<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

$INPUT_ID = trim($arParams["~INPUT_ID"]);
if($INPUT_ID == '')
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if($CONTAINER_ID == '')
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
	<?
	$searchQuery = '';
	if (isset($_REQUEST['q']) && is_string($_REQUEST['q'])) {
		$searchQuery = trim($_REQUEST['q']);
	}
	?>


	<div id="<?=$CONTAINER_ID?>">
		<form class="search-form" action="<?=$arResult["FORM_ACTION"]?>">
			<div class="search-form__input-container">
				<input class="search-form__input" id="<?=$INPUT_ID?>" type="text" name="q" size="40" maxlength="50" autocomplete="off" placeholder="Поиск по каталогу запчастей" value="<?if($searchQuery !== ''):?><?=$searchQuery?><?endif?>">
			</div>
			<div class="search-form__btn-container">
				<button class="search-form__btn" type="submit">Найти</button>
			</div>
		</form>
	</div>
<?endif?>
<script>
	BX.ready(function(){
		new JCTitleSearch({
			'AJAX_PAGE' : '<?=CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?=$CONTAINER_ID?>',
			'INPUT_ID': '<?=$INPUT_ID?>',
			'MIN_QUERY_LEN': 3
		});
	});
</script>