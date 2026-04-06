<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$rs = new CDBResult;
$rs->InitFromArray($arResult['SECTIONS']);
$rs->NavStart(6);
if ($rs->IsNavPrint()):?>
	<h1 class="page-title page-title_margin_bottom">Каталог продукции</h1>
	<section class="section section_padding-bottom_big">
		<div class="ajax">
		<ul class="catalog-sections ajax-container">
		<?while ($arSection = $rs->Fetch()):
			$db_list = CIBlockSection::GetList(Array($by => $order),
			$arFilter = Array(
				'IBLOCK_ID' => $arSection['IBLOCK_ID'],
				'ID' => $arSection['ID']),
				true
			);?>
			<li class="catalog-sections__item ajax-item">
				<a class="catalog-sections__link" href="<?=$arSection['SECTION_PAGE_URL']?>">
					<div class="catalog-section__info">
						<div class="catalog-section__title section-subtitle"><?=$arSection['NAME']?></div>
						<div class="catalog-section__price">от <?=$arSection['MIN_PRICE']?> руб.</div>
						<div class="catalog-section__btn-container">
							<div class="catalog-section__btn">Подробнее</div>
						</div>
					</div>
					<div class="catalog-section__img-container">
						<img class="catalog-sections__img" src="<?=$arSection['PICTURE']['SRC']?>" alt="<?=$arSection['NAME']?>">
					</div>
				</a>
			</li>
		<?endwhile?>
		</ul>
		<?=$rs->GetPageNavStringEx($navComponentObject, '', '.default', false, 0);?>
		</div>
	</section>
<?endif?>