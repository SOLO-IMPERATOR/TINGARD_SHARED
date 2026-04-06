<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 
$titleN = '';
$APPLICATION->AddChainItem( $arResult['INFO'][4]." ".$arResult['INFO'][6], "/checklist/{$arResult['INFO'][6]}/");
$checkPoint = $arResult['CHECK_POINT']['PROP']['CHECK_POINT']['VALUE'];

$arFillPoint = [];
// заливка этапов:
foreach($arResult['SECTION_PARENT']['SECTIONS'] as $item){
	$countItemPoint = count($arResult['AR_ELEMENTS'][$item['ID']]);
	$countItemCheck = 0;
	foreach($arResult['AR_ELEMENTS'][$item['ID']] as $value){
		if($arResult['AR_PAGIN'][$value['ID']] == 'Y'){
			$countItemCheck++;
		} 
	}
    $classFill = "";
    if( $countItemPoint == $countItemCheck && $countItemPoint !=0 ){
        $classFill = "checklist-steps__list-item-container_completed";
	}elseif( $countItemPoint > $countItemCheck &&  $countItemCheck !=0 ) {
        $classFill = "checklist-steps__list-item-container_active";
	}
    $arFillPoint[$item['ID']] = $classFill;
}


?>
<main>
	<? if($_GET['debug'] == 'Y'){?>
		<pre><?  print_r($arFillPoint) ?></pre>
	<?}?>
	<section class="section container section_padding_bottom_big container">
		<h1 class="page-title margin_b_m"><?=$arResult['INFO'][4]?> <?=$arResult['INFO'][6]?></h1>
		<div class="checklist-steps">
			<div class="checklist-steps__desc-container">
                <div class="checklist-steps__desc">
                    <span class="checklist-steps__desc-name">Номер рамы</span>
                    <span class="checklist-steps__desc-separator"></span>
                    <span class="checklist-steps__desc-value"><?=$arResult['INFO'][6]?></span>
                </div>
                <? if( !empty($arResult['INFO'][3]) ) {?>
				<div class="checklist-steps__desc">
					<span class="checklist-steps__desc-name">Заказ-наряд</span>
					<span class="checklist-steps__desc-separator"></span>
					<span class="checklist-steps__desc-value"><?=$arResult['INFO'][3]?></span>
				</div>
                <?}?>
				<div class="checklist-steps__desc">
					<span class="checklist-steps__desc-name">Модель</span>
					<span class="checklist-steps__desc-separator"></span>
					<span class="checklist-steps__desc-value"><?=$arResult['INFO'][4]?></span>
				</div>
				<div class="checklist-steps__desc">
					<span class="checklist-steps__desc-name">Цвет</span>
					<span class="checklist-steps__desc-separator"></span>
					<span class="checklist-steps__desc-value"><?=$arResult['INFO'][5]?></span>
				</div>
				<div class="checklist-steps__desc">
					<span class="checklist-steps__desc-name">Месяц выполнения</span>
					<span class="checklist-steps__desc-separator"></span>
					<span class="checklist-steps__desc-value"><?=$arResult['INFO'][23]?></span>
				</div>
				<div class="checklist-steps__desc">
					<span class="checklist-steps__desc-name">Ответственный на текущем этапе</span>
					<span class="checklist-steps__desc-separator"></span>
					<span class="checklist-steps__desc-value"><?=$arResult['CURRENT_USER']['NAME']?> <?=$arResult['CURRENT_USER']['LAST_NAME']?></span>
				</div>
			</div>
			<style>
				a.disabled {
					pointer-events: none;
					cursor: default;
				}
				.checklist-steps__list-item-container_completed a span{
					color: #FFF;
				}
                .checklist-steps__hide{
                    padding: 0 10px;
                    cursor: pointer;
                }
			</style>
			<div class="checklist-steps__list">
				<? 
					$i = 1;
					$userCurrID = \Bitrix\Main\Engine\CurrentUser::get()->getId();
					$permison = true; 
					$arUsersCheck = $arResult['RESPONSIBLE_USER'];
				?>
				<? foreach($arResult['SECTION_PARENT']['SECTIONS'] as $item){?>
					<div class="checklist-steps__list-item-container <?= $arFillPoint[$item['ID']] ?>">
					<div class="checklist-steps__list-item">
						<span class="checklist-steps__list-num"><?=$i?></span>
						<span class="checklist-steps__list-name"><?=$item['NAME']?><span class="checklist-steps__hide" data-hideblock="<?=$item['ID']?>">&#9650;</span></span>

					</div>		
					<? if($arResult['AR_ELEMENTS'][$item['ID']]){ ?>
						<div class="checklist-steps__questions parent<?=$item['ID']?>" style="display: none;">
							<? foreach($arResult['AR_ELEMENTS'][$item['ID']] as $value){?>
								<?
									$class = '';
									if($arResult['AR_PAGIN'][$value['ID']] == 'Y'){
										$class = 'checklist-steps__questions-item_completed';	
									} 
								?>
								<a class="checklist-steps__questions-item <?= $class?> <?if(!$permison) echo 'disabled'?>" href="/checklist/check/<?=$value['ID']?>_<?=$arResult['INFO'][6]?>/">
									<span class="checklist-steps__questions-name"><?=$value['CODE']?> <?=$value['NAME']?></span>
								</a>
							<?}?>
						</div>
					<?}?>
					<? if($arResult['CHECK_FILL'][$item['ID']]){?>
						<? $arUserParams = $arResult['RESPONSIBLE_USER'][$item['ID']];?>
						<span class="checklist-steps__list-responsible">Ответственный: <?=$arUserParams['LAST_NAME']?> <?=$arUserParams['NAME']?></span>
					<? } ?>
				</div>
				<? $i++;
					if( $item['FIELD_TYPE'] == $userCurrID ){
					$permison = false; 
					}else {
						$permison = true;
					}
				}?>
			</div>
		</div>
	</section>
</main>