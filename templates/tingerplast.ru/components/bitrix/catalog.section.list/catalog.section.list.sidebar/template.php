<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>

<?/* echo '<pre>'; print_r($arResult['ROOT']['SECTIONS']); echo '</pre>'; */?>

<ul class="nav">
	<li class="nav__item">
		<div class="nav__item-title">Ротоформовочная продукция</div>
		<ul class="nav__list">
		<?foreach($arResult['ROOT']['SECTIONS'] as $section):?>
			<?if($section['UF_GENERAL_SECTION'] == 4):?>
			<li class="nav__list-item">
			<img class="nav__list-img" src="<?=CFile::GetPath($section['UF_SECTION_ICON'])?>" alt="Иконка раздела">
			<a class="nav__item-link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
			<?if(isset($section['SECTIONS'])):?>
				<ul class="nav__sublist">
				<?foreach($section['SECTIONS'] as $subsection):?>
					<li class="nav__sublist-item">
						<a class="nav__sublist-link" href="<?=$subsection['SECTION_PAGE_URL']?>"><?=$subsection['NAME']?></a>
					</li>
				<?endforeach?>
				</ul>
			<?endif?>
			</li>
			<?endif?>
		<?endforeach?>
		</ul>
	</li>
	<li class="nav__item">
		<div class="nav__item-title">Экструзия</div>
		<ul class="nav__list">
		<?foreach($arResult['ROOT']['SECTIONS'] as $section):?>
			<?if($section['UF_GENERAL_SECTION'] == 5):?>
			<li class="nav__list-item">
				<img class="nav__list-img" src="<?=CFile::GetPath($section['UF_SECTION_ICON'])?>" alt="Иконка раздела">
				<a class="nav__item-link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
				<?if(isset($section['SECTIONS'])):?>
					<ul class="nav__sublist">
					<?foreach($section['SECTIONS'] as $subsection):?>
						<li class="nav__sublist-item">
							<a class="nav__sublist-link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$subsection['NAME']?></a>
						</li>
					<?endforeach?>
					</ul>
				<?endif?>
			</li>
			<?endif?>
		<?endforeach?>
		</ul>
	</li>
	<li class="nav__item">
		<div class="nav__item-title">Мотовездеходная техника</div>
		<ul class="nav__list">
		<?foreach($arResult['ROOT']['SECTIONS'] as $section):?>
			<?if($section['UF_GENERAL_SECTION'] == 6):?>
			<li class="nav__list-item">
				<img class="nav__list-img" src="<?=CFile::GetPath($section['UF_SECTION_ICON'])?>" alt="Иконка раздела">
				<a class="nav__item-link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
				<?if(isset($section['SECTIONS'])):?>
					<ul class="nav__sublist">
					<?foreach($section['SECTIONS'] as $subsection):?>
						<li class="nav__sublist-item">
							<a class="nav__sublist-link" href="<?=$section['SECTION_PAGE_URL']?>"><?=$subsection['NAME']?></a>
						</li>
					<?endforeach?>
					</ul>
				<?endif?>
			</li>
			<?endif?>
		<?endforeach?>
		</ul>
	</li>
	<?/* global $USER; if ($USER->IsAdmin()): */?>
	<li class="nav__item">
		<div class="nav__item-title">Дополнительные услуги</div>
		<ul class="nav__list">
			<li class="nav__list-item">
			<img class="nav__list-img" src="<?=SITE_TEMPLATE_PATH?>/img/extrusion-icon-2.svg" alt="Иконка раздела">
				<a class="nav__item-link" href="/raskroj-polimernogo-lista/">Раскрой полимерного листа</a>
			</li>
			<li class="nav__list-item">
				<img class="nav__list-img" src="<?=SITE_TEMPLATE_PATH?>/img/extrusion-icon-1.svg" alt="Иконка раздела">
				<a class="nav__item-link" href="/izgotovlenie-detalej-iz-polimernogo-lista/">Изготовление деталей из полимерного листа</a>
			</li>
		</ul>
	</li>
	<?/* endif */?>
</ul>