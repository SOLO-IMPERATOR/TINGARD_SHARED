<?php 
/* 
 Comment Text 
*/
$arPromocode = $arResult['RESULT_TABLE_ITEM'];
$curDate = date("d.m.Y");
?>

<main>
    <section class="page__section page__section_padding-top_big page__section_padding-bottom_big container">
        <div class="promo">
			<div class="promo__inner">
				<? if( $arResult['IS_PROMOCODE'] ){ ?>
					<div class="promo__title page__section-title">Ваш промокод: <span class="promo__title_accent"><?=$arPromocode[4]?></span></div>
					<ul class="promo__list">
						<li class="promo__list-item">даёт право на получение скидки;</li>
						<li class="promo__list-item">действителен до <span class="promo__list-item_accent"><?=$arPromocode[9]?></span>;</li>
						<? if( !empty($arPromocode[10]) ) {?>
							<li class="promo__list-item"><?=$arPromocode[10]?></li>
						<?}else {?>
							<li class="promo__list-item">обязательно сообщите промокод менеджеру компании для получения скидки.</li>
						<?}?>
					</ul>
					<? if( strtotime($curDate) > strtotime($arPromocode[9]) ){ ?>
					<p class="promo__note note note_type_errortext">Срок действия промокода истек.</p>
					<? } ?>
				<?}else {?>
					<div class="promo__title section-title">Промокод не указан.</div>
				<?}?>
				<div class="promo__btn-container">
					<a href="/" class="btn btn_color_blue">Перейти на главную</a>
				</div>
			</div>
		</div>
    </section>
</main>