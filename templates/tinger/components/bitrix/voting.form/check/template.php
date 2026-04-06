<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><? //print_r($arResult['QUESTIONS']) ?></pre>
<style>
	a.disabled {
		pointer-events: none;
		cursor: default;
	}
	.checklist-steps__list-item-container_completed a span{
		color: #FFF;
	}
</style>
<div class="checklist-steps__list">
	<? 
		$i = 1;
		$userCurrID = \Bitrix\Main\Engine\CurrentUser::get()->getId();
		$permison = true; 
		$arUsersCheck = $arResult['RESPONSIBLE_USER'];
	?>
	<? foreach($arResult['QUESTIONS'] as $item){?>
		<div class="checklist-steps__list-item-container <?=$arResult['CHECK_FILL'][$item['ID']]?>">
		<div class="checklist-steps__list-item">
			<!-- <span class="checklist-steps__list-num"><?=$i?></span> -->
			<span class="checklist-steps__list-name"><?=$item['QUESTION']?> <?'id-'.$item['ID']?> <?'u-'.$item['FIELD_TYPE']?></span>
		</div>		
		<? if($item['ANSWERS']){ ?>
			<div class="checklist-steps__questions">				
				<? foreach($item['ANSWERS'] as $value){?>
					<?
						$class = '';
						if($value['COUNTER'] > 0 ) $class = 'checklist-steps__questions-item_completed';	
					?>
					<a class="checklist-steps__questions-item <?= $class?> <?if(!$permison) echo 'disabled'?>" href="/prod/check/<?=$value['ID']?>/">
						<span class="checklist-steps__questions-name"><?=$value['MESSAGE']?></span>
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