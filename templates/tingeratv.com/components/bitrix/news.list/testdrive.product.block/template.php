<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);

/* echo '<pre>'; print_r($arResult); echo '</pre>'; */
?>

<div class="testdrive__models">
	<?foreach ($arResult["ITEMS"] as $get_models):?>
		<?if ($get_models["DISPLAY_PROPERTIES"]["TESTDRIVE"]["VALUE"] == "Y"):?>
			<label class="model-card testdrive__models-item testdrive-models__radio">
				<?if ($get_models['ID'] == 66 || $get_models['ID'] == 67):?>
					<span class="model-card__label label model-card__label_right_20">скидка до 200 000 ₽</span>
				<?endif?>
				<input class="radio__input" type="radio" name="models" value="<?=$get_models['PROPERTIES']['M_SHORT_NAME']['VALUE']?>" required>
				<span class="radiobox__container">
					<span class="radiobox"></span>
					<span class="radiobox__text">Выбрать</span>
				</span>
				<img class="model-card__img" src="<?=$get_models["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$get_models["PROPERTIES"]["M_SHORT_NAME"]["VALUE"]?>">
				<p class="model-card__title h6"><?=$get_models["NAME"]?></p>
				<p class="model-card__price"><span class="model-card__price-tagline">Цена от</span> <?=$get_models["DISPLAY_PROPERTIES"]["C_PRICE"]["VALUE"]?> руб.</p>
			</label>
		<?endif?>
	<?endforeach?>
</div>