<?php 
/* 
 Comment Text 
*/
$question 	= $arResult['QUESTION'];
$check 		= $arResult['CHECK'];
$info  		= $arResult['ELEMENT'];
$vote  		= $arResult['VOTE']; 
$arAnswersID= $arResult['ALL_ELEMENTS'];
$APPLICATION->AddChainItem( $arResult['CheckPoint']['NAME'] .' '. $arResult['CheckPoint']['CODE'], "/checklist/{$arResult['ORDER']}/");
$APPLICATION->AddChainItem($arResult['POINT']['NAME']);

?>
<style>
	#loader{
		display: none;
		position: fixed;
		background: rgba(0, 0, 0, 0.2);
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		overflow: hidden;
		overflow-y: auto;
		-webkit-overflow-scrolling: touch;
		flex-flow: column nowrap;
		justify-content: center; /* см. ниже */
		align-items: center;
		z-index: 99;
		padding:30px 0;
	}

#loader img {
    margin: 0 auto;
}

.bottom_back{
	border: 2px solid var(--green);
    padding: 3px 5px;
    border-radius: 1000px;
    margin: 2px;
    min-width: 40px;
    text-align: center;
    color: var(--green);
}

</style>
<div id="loader">
	<div class="loader-beckground">
		<div class="loader-loadingicon">
			<img src="<?=SITE_TEMPLATE_PATH?>/img/loader/loading.gif">
		</div>
	</div>
</div>

<main>
	<section class="section container section_padding_bottom_small container">
		<a class="bottom_back" href="/checklist/<?=$arResult['ORDER']?>/">Назад в список</a>
	</section>
	<? if($_GET['debug'] == 'Y') {?>
		<pre><? print_r($arResult) ?></pre>
	<?}?>
	<section class="section container section_padding_bottom_big container">
		<h1 class="page-title margin_b_s"><?=$arResult['ELEMENT']['CODE']?> <?=$arResult['ELEMENT']['NAME']?></h1>
		<div class="checklist-question">
			<div class="checklist-question__name section-subtitle"><?=$check['MESSAGE']?></div>
            <? if($info['PREVIEW_TEXT']){ 
                echo $info['PREVIEW_TEXT'];
            }?>
			<? if( !empty($info['MORE_PHOTE']['VALUE'] ) ){?>
				<div class="checklist-question__images-container margin_t_s">
					<?foreach( $info['MORE_PHOTE']['VALUE'] as $item ){?>
					<a href="<?=CFile::GetPath($item)?>" class="glightbox checklist-question__image-wrap" data-zoomable="true" data-draggable="true">
						<img class="checklist-question__img" 
							src="<?=CFile::GetPath($item)?>" alt="Изображение<?=$item?>">
					</a>
					<?}?>
				</div>
			<?}?>
		</div>
		<div class="checklist-question__btn-container">
			<?
			
				$userGroup = 'fitter';
				if( $arResult['GROUP_USER_PROD'] == 'ok') $userGroup = 'fitter';
				
				$nextStep = $info['ID'];
				foreach( $arAnswersID as $key => $item ){
					if( $item['ID'] == $info['ID'] ){
						if(empty($arAnswersID[$key+1])){ $nextStep = $item; }else {$nextStep = $arAnswersID[$key+1]; }
						break;
					}
				}
				unset( $item );
			?>
			<button class="btn btn_color_green" type="button" id="addCheck" 
				data-answer="<?=$info['ID']?>"
				data-stage="<?=$arResult['POINT']['ID']?>"
				data-order="<?=$arResult['ORDER']?>"
				data-group="<?=$arResult['GROUP_USER_PROD']?>" 
				data-question="<?=$question['ID']?>"
				data-vertical-pos="<?=$arResult['V_POS']?>"
				data-nextstep="<?=$nextStep['ID'].'_'.$arResult['ORDER']?>"
                data-end = <? if ( $info['ID'] == $nextStep['ID']){ echo 'true'; }else{ echo 'false';} ?>
				data-action="up">Да</button>
			<?
			switch ($arResult['GROUP_USER_PROD']) {
				case 'otk':
					?>
						<!-- кнопка для ОТК -->
						<button class="btn btn_color_red" type="button" id="cancelCheck" 
						data-answer="<?=$info['ID']?>"
						data-stage="<?=$arResult['POINT']['ID']?>"
						data-order="<?=$arResult['ORDER']?>"
						data-group="<?=$arResult['GROUP_USER_PROD']?>"
						data-vertical-pos="<?=$arResult['V_POS']?>"
						data-nextstep="<?=$nextStep['ID'].'_'.$arResult['ORDER']?>"  
						data-action="delete">Отменить</button>
					<?
					break;
				
				default:
					?>
					<!-- кнопка для сборщиков -->
					<button class="btn btn_color_red" type="button" id="deleteCheck" 
					data-answer="<?=$info['ID']?>"
					data-stage="<?=$arResult['POINT']['ID']?>"
					data-order="<?=$arResult['ORDER']?>"
					data-group="<?=$arResult['GROUP_USER_PROD']?>" 
					data-vertical-pos="<?=$arResult['V_POS']?>"
					data-nextstep="<?=$nextStep['ID'].'_'.$arResult['ORDER']?>"
					data-action="delete">Нет</button>
					<?
					break;
			}
			?>
			
		</div>
		<div class="checklist-question__pagination">
			<? foreach ($arResult['ALL_ELEMENTS'] as $item ){?>
				<?
					$classNum = '';
					if( $arResult['AR_PAGIN'][$item['ID']] == 'Y' ) $classNum = 'checklist-question__pagination-item_completed';
					if( $item['ID'] == $info['ID'] ) $classNum = 'checklist-question__pagination-item_active';
					$ind = substr($item['MESSAGE'], 0, 4);
				?>
				<a class="checklist-question__pagination-item <?=$classNum?>" href="/checklist/check/<?=$item['ID']?>_<?=$arResult['ORDER']?>/"><?=$item['CODE']?></a>
			<?}?>			
		</div>
		<div class="modal-checklist-question_comment" id="comment-box" style="display:none;">
			<form class="modal-checklist-question_commentform">
				<label for>Опишите причину отмены:</label>
				<textarea id="modal-checklist-question_input-comment" style='width: 100%;'></textarea>
				<button type="button" id="modal-checklist-question_submit" 
				data-answer="<?=$info['ID']?>"
				data-stage="<?=$arResult['POIN']['ID']?>"
				data-order="<?=$arResult['ORDER']?>"
				data-group="<?=$arResult['GROUP_USER_PROD']?>"
				data-nextstep="<?=$nextStep['ID'].'_'.$arResult['ORDER']?>"  
				data-action="delete">Отправить</button>
			</form>
		</div>
	</section>
</main>