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
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isSidebarLeft = isset($arParams['SIDEBAR_SECTION_POSITION']) && $arParams['SIDEBAR_SECTION_POSITION'] === 'left';
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}














if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] === 'Y') {
	$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
} else {
	$basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
}



?>


<?if($arResult['VARIABLES']['SECTION_ID'] == 104):?>
	<?$arParams["PAGE_ELEMENT_COUNT"] = 4;?>

	<h1 class="page-title page-title_margin_bottom"><?php $APPLICATION->ShowTitle(false);?></h1>
	<section class="section section_padding-bottom_small">
		<p>Бесшовные пластиковые погреба TINGARD от производителя TINGERPLAST – это удобное решение вашей задачи по хранению запаса овощей и заготовок. Погреба производятся с помощью технологии ротоформовки, не имеют швов и выполнены из пищевого пластика. Внутри погреба металлический каркас. Благодаря такой конструкции, погреб из пластика остается цельным и не деформируется под тяжестью грунта.</p>
	</section>

	<section class="section section_padding-bottom_small section-benefits">
		<ul class="section-benefits__list">
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar/benefits-icon-1.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Бесшовный герметичный</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">TINGARD изготовлен по специальной технологии методом ротационного формования. Благодаря этому изделие не имеет швов сварки. Погреб представляет собой цельную герметичную конструкцию с ребрами жесткости и обладает абсолютной герметичностью в любых условиях эксплуатации. Может использоваться круглый год.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar/benefits-icon-2.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Высокопрочный пищевой пластик</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">При изготовлении ТИНГАРД используется высокопрочный и безопасный для окружающей среды и здоровья человека пищевой пластик (полиэтилен LLDPE). Материал обладает повышенной прочностью, твердостью и устойчивостью к ударным нагрузкам. На нем не живет и не размножается плесень и грибок. Толщина стенок до 15 мм.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar/benefits-icon-3.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Гарантия 5 лет</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">Полная уверенность в подземных погребах TINGARD позволяет нам предоставить 5-и летнюю гарантию. В течение гарантийного срока покупатель имеет право на бесплатный ремонт изделия по неисправностям, являющимися следствием производственных дефектов.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar/benefits-icon-4.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Срок службы большее 100 лет</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">Высокопрочный пищевой полиэтилен и технология изготовления делает погреб от производителя Tingerplast практически вечным, который прослужит вам и вашим внукам. И он не требует обслуживания! Так как пластику с годами ничего не угрожает и вашему хранилищу ничего не будет, по сравнению с традиционными погребами.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar/benefits-icon-5.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Комфортная температура для хранения продуктов</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">ТИНГАРД оснащен приточно-вытяжной вентиляцией естественного типа. Продуманная система позволяет поддерживать внутри погреба необходимый уровень влажности и комфортный температурный режим круглый год.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar/benefits-icon-6.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Не подвержен коррозии и внешним факторам</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">В пластиковом погребе не образуется сырость и плесень, он не гниет и не ржавеет. TINGARD оснащен встроенным металлическим каркасом, изготовленным из стали 09Г2С, которая на 50% прочнее обычной стали. Это обеспечивает прочность погреба, и позволяет ему выдерживать давление тяжелых грунтов, а также высоких грунтовых вод.</div>
				</div>
			</li>
		</ul>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_big">
		<h2 class="section-title section-title_margin_bottom">Из чего состоит пластиковый погреб TINGARD</h2>
		<div class="cellar-detail">
			<img class="cellar-detail__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar/cellar.webp" alt="Погреб TINGARD в разрезе">
			<ul class="cellar-detail__list">
				<li class="cellar-detail__item cellar-detail__item_type_cover"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_left">Крышка в виде люка <span class="cellar-detail__item-desc-detail">Пластиковая крышка с утеплителем. Эксплуатация возможна круглый год, никаких дополнительных действий делать не нужно.</span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_ventilation"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_right">Приточно-вытяжная вентиляция <span class="cellar-detail__item-desc-detail">Подобная вентиляция позволяет погребу Tingard поддерживать необходимую температуру для хранения урожая и заготовок при стандартных условиях.</span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_station"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_left">Метеостанция <span class="cellar-detail__item-desc-detail">Работает от батареек, поэтому к погребу не нужно тянуть дополнительные провода с электричеством, крепится на металлической поверхности, показывает уровень температуры в погребе.</span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_lighting"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_right">Встроенное освещение <span class="cellar-detail__item-desc-detail">Работает от батареек, не требует проводить дополнительное электричество для освещения, что позволяет не увеличивать стоимость эксплуатации погреба.</span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_body"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_right">Бесшовный пластиковый копрус <span class="cellar-detail__item-desc-detail">Изготовлен из качественных первичных материалов – пищевых гранул LLDPE, технология производства – нагревание гранул в ротоформовочной печи, где пластик растекается по форме, формируя бесшовный погреб. Пластик LLDPE является пищевым пластиком, это значит, что хранить в нем урожай и заготовки безопасно.</span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_shelves"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_right">Деревянные полки 2-3-х уровней <span class="cellar-detail__item-desc-detail">Для полок мы используем дерево, дерево достаточно прочное, на него можно ставить как ящики с урожаем, так и трехлитровые банки с заготовками или другие продукты питания. Держатся полки на металлическом каркасе. </span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_ladder"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_left">Металлическая лестница <span class="cellar-detail__item-desc-detail">Ставим металлическую, а не деревянную лестницу, чтобы она прослужила дольше. Деревянные лестницы со временем развалятся, так как это биоматериал, а металл будет служить долго, что позволит эксплуатировать и не обслуживать пластиковый погреб долгие года. Такая конструкция характерна своей жесткостью и при спуске в погреб, лестница не шатается.</span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_flooring"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_right">Деревянный настил <span class="cellar-detail__item-desc-detail">Настил в пластиковом погребе выполнен из надежных материалов, он не прогибается под весом человека и нагруженных полок. Можно заказать не деревянный настил, а декинг, что улучшит эксплуатацию погреба.</span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_frame"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_left">Металлический каркас <span class="cellar-detail__item-desc-detail">Чтобы погреб возможно было установить в разнообразные грунты, мы решили оснастить его дополнительным жесткими конструкциями –  металлическим каркасом, так как пластик, даже с большой толщиной стенок, неспособен выдержать давление части грунтов.</span></span></li>
				<li class="cellar-detail__item cellar-detail__item_type_steps"><span class="cellar-detail__item-desc cellar-detail__item-desc_visibility_left">Деревянные ступени <span class="cellar-detail__item-desc-detail">Погреб комплектуется удобными ступенями из дерева, если ступени формованные, то к ним крепится антискользящее покрытие.</span></span></li>
			</ul>
		</div>
	</section>

<?endif?>


<?if($arResult['VARIABLES']['SECTION_ID'] == 105):?>
	<?$arParams["PAGE_ELEMENT_COUNT"] = 4;?>


	<h1 class="page-title page-title_margin_bottom"><?php $APPLICATION->ShowTitle(false);?></h1>
	<section class="section section_padding-bottom_small">
		<p>Производим пластиковые ёмкости и баки объёмом от 10 до 50 кубов. Наши ёмкости подходят для подземного монтажа. Такие цилиндрические ёмкости подойдут для большинства жидкостей, в том числе для воды. В производстве используем только первичное сырьё. А цена на пластиковые емкости вас порадуют, так как у нас собственное производство в России и нет расходов на дополнительную логистику.</p>
	</section>
	<section class="section section_padding-bottom_small section-benefits">
		<!-- <h2 class="section-title section-title_margin_bottom">Преимущества</h2> -->
		<ul class="section-benefits__list">
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-benefits-icon-1.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Прочность конструкции</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">Толщина стенок до 20 мм, благодаря этому пластиковые ёмкости прочны и можно не опасаться за то, что их испортят грызуны или другие животные. Кроме того, на прочность влияет наличие вертикальных рёбер жесткости.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-benefits-icon-2.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Только первичный полиэтилен</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">При изготовлении используется высокопрочный и безопасный для окружающей среды и здоровья человека пищевой полиэтилен (LLDPE). Материал обладает повышенной прочностью, твердостью и устойчивостью к ударным нагрузкам. Материал химически нейтрален, на нем не образуется плесень и не размножается грибок.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-benefits-icon-3.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Эксплуатация от -40⁰C до +40⁰C</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">Благодаря материалу и конструкторским решениям, пластиковые емкости можно использовать круглый год, как на крайнем севере, так и в южных широтах.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-benefits-icon-4.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Срок службы 100 лет</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">Полиэтилен LLDPE не разлагается и не портится со временем. Поэтому, если вы будете придерживаться рекомендации по монтажу и эксплуатаций, емкость из пластика прослужит вам 100 и более лет.</div>
				</div>
			</li>
			<li class="section-benefits__item">
				<div class="section-benefits__head">
					<div class="section-benefits__img-container">
						<img class="section-benefits__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-benefits-icon-1.svg" alt="Иконка">
					</div>
					<div class="section-benefits__name">Не подвержены коррозии</div>
				</div>
				<div class="section-benefits__body">
					<div class="section-benefits__text">Емкость произведена из пластика, поэтому вы можете не опасаться ржавчины, которая влияет на целостность и долговечность металлической конструкции, а также на свойства хранящейся жидкости.</div>
				</div>
			</li>
		</ul>
	</section>
	<section class="section section_padding-top_small section_padding-bottom_big">
		<h2 class="section-title section-title_margin_bottom">Конструкция пластиковой емкости TINGERPLAST</h2>
		<div class="tank__body-container">
			<div class="tank__body">
				<div class="tank__img-container">
					<img class="tank__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-img-1280.webp" alt="Ёмкость в разрезе">
					<ul class="tank__list">
						<li class="tank__list-item tank__list-item_name_material">
							<div class="tank__list-content">
								<div class="tank__list-name">Материал</div>
								<div class="tank__list-desc">Емкость изготовлена из первичного сырья – пищевого полиэтилена (LLDPE), обладающим такими свойствами, как экологичность, долговечность, прочность и т. д.</div>
							</div>
						</li>
						<li class="tank__list-item tank__list-item_name_additional-neck">
							<div class="tank__list-content">
								<div class="tank__list-name">Доп. горловина</div>
								<div class="tank__list-desc">Пластиковые резервуары от TINGERPLAST можно погрузить в землю на глубину до 2.4 м. Дополнительная горловина может применяться при монтаже на большую глубину в цоколь или при обсыпке емкости землей сверху.</div>
							</div>
						</li>
						<li class="tank__list-item tank__list-item_name_stiffening-rib">
							<div class="tank__list-content">
								<div class="tank__list-name">Рёбра жёсткости</div>
								<div class="tank__list-desc">Ребра жесткости необходимы, чтобы конструктив емкости из пластика оставался без каких-либо искривлений, смещений и т. п. от давления грунтовых вод или жидкости изнутри.</div>
							</div>
						</li>
						<li class="tank__list-item tank__list-item_name_wall-thickness">
							<div class="tank__list-content">
								<div class="tank__list-name">Толщина стенки</div>
								<div class="tank__list-desc">Пластиковые стенки емкости до 20мм, такая толщина позволяет конструкции оставаться цельной, ее не смогут повредить грызуны или другие дикие животные, а также случайные удары тяжелыми предметами.</div>
							</div>
						</li>
						<li class="tank__list-item tank__list-item_name_welds">
							<div class="tank__list-content">
								<div class="tank__list-name">Сварные швы</div>
								<div class="tank__list-desc">При заказе емкости от 20 м<sup>3</sup>, мы производим конструкцию, сваривая между собой 10-ти кубовые емкости. Сварка происходит способом, благодаря чему шов абсолютно герметичен и ровный.</div>
							</div>
						</li>
						<li class="tank__list-item tank__list-item_name_lid">
							<div class="tank__list-content">
								<div class="tank__list-name">Пластиковая крышка</div>
								<div class="tank__list-desc">Крышку легко открыть или закрыть. Вместе с горловиной крышка имеет комфортный диаметр для наполнения тары разными жидкостями.</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>



<?endif?>

<div class="section-header">
<?if($arResult['VARIABLES']['SECTION_ID'] == 105):?>
	<h2 class="section-header__title page-title page-title_margin_bottom">Выберите подходящую вам пластиковую ёмкость</h2>
<?elseif($arResult['VARIABLES']['SECTION_ID'] == 104):?>
	<h2 class="section-header__title page-title page-title_margin_bottom">Выберите подходящий вариант погреба</h2>
<?else:?>
	<h1 class="section-header__title page-title page-title_margin_bottom"><?php $APPLICATION->ShowTitle(false);?></h1>
<?endif?>
	


	<?
		$sectionListParams = array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
			"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
			"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
			"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
			"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
			"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
		);
		if ($sectionListParams["COUNT_ELEMENTS"] === "Y")
		{
			$sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_ACTIVE";
			if ($arParams["HIDE_NOT_AVAILABLE"] == "Y")
			{
				$sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_AVAILABLE";
			}
		}
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"catalog.section.list.subsection",
			$sectionListParams,
			$component,
			array("HIDE_ICONS" => "Y")
		);
		unset($sectionListParams);
	?>
	<?if($isFilter):?>
		<? $APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "catalog.smart.filter", array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arCurSection['ID'],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"PRICE_CODE" => $arParams["~PRICE_CODE"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SAVE_IN_SESSION" => "N",
				"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
				"XML_EXPORT" => "N",
				"SECTION_TITLE" => "NAME",
				"SECTION_DESCRIPTION" => "DESCRIPTION",
				'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
				"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				"SEF_MODE" => $arParams["SEF_MODE"],
				"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
				"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		);
		?>
	<?endif?>
</div>


		<?

		$intSectionID = $APPLICATION->IncludeComponent("bitrix:catalog.section", "catalog.section", array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
				"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
				"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
				"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
				"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
				"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
				"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
				"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
				"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
				"BASKET_URL" => $arParams["BASKET_URL"],
				"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"MESSAGE_404" => $arParams["~MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
				"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
				"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
				"PRICE_CODE" => $arParams["~PRICE_CODE"],
				"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
				"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
				"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
				"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
				"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

				"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
				"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
				"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
				"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"LAZY_LOAD" => $arParams["LAZY_LOAD"],
				"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
				"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

				"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
				"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
				"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
				"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
				"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
				"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
				"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
				"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
				"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
				'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

				'LABEL_PROP' => $arParams['LABEL_PROP'],
				'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
				'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
				'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
				'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
				'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
				'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
				'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
				'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
				'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
				'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
				'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

				'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
				'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
				'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
				'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
				'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
				'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
				'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
				'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
				'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
				'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
				'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
				'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE'] ?? '',
				'MESS_NOT_AVAILABLE_SERVICE' => $arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '',
				'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

				'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
				'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
				'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

				'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
				"ADD_SECTIONS_CHAIN" => "N",
				'ADD_TO_BASKET_ACTION' => $basketAction,
				'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
				'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
				'COMPARE_NAME' => $arParams['COMPARE_NAME'],
				'USE_COMPARE_LIST' => 'Y',
				'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
				'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
				'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
			),
			$component
		);
		?>


		<? $GLOBALS['CATALOG_CURRENT_SECTION_ID'] = $intSectionID;

		if (ModuleManager::isModuleInstalled("sale"))
		{
			if (!empty($arRecomData))
			{
				if (!isset($arParams['USE_BIG_DATA']) || $arParams['USE_BIG_DATA'] != 'N')
				{
					?>
					<div class="row">
						<div class="col" data-entity="parent-container">
							<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;"><?=GetMessage('CATALOG_PERSONAL_RECOM')?></div>
							<? $APPLICATION->IncludeComponent(
								"bitrix:catalog.section",
								"bootstrap_v4", array(
									"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
									"IBLOCK_ID" => $arParams["IBLOCK_ID"],
									"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
									"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
									"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
									"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
									"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
									"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
									"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
									"BASKET_URL" => $arParams["BASKET_URL"],
									"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
									"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
									"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
									"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
									"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
									"CACHE_TYPE" => $arParams["CACHE_TYPE"],
									"CACHE_TIME" => $arParams["CACHE_TIME"],
									"CACHE_FILTER" => $arParams["CACHE_FILTER"],
									"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
									"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
									"PAGE_ELEMENT_COUNT" => 0,
									"PRICE_CODE" => $arParams["~PRICE_CODE"],
									"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
									"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

									"SET_BROWSER_TITLE" => "N",
									"SET_META_KEYWORDS" => "N",
									"SET_META_DESCRIPTION" => "N",
									"SET_LAST_MODIFIED" => "N",
									"ADD_SECTIONS_CHAIN" => "N",

									"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
									"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
									"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
									"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
									"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

									"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
									"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
									"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
									"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
									"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
									"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
									"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
									"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

									"SECTION_ID" => $intSectionID,
									"SECTION_CODE" => "",
									"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
									"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
									"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
									'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
									'CURRENCY_ID' => $arParams['CURRENCY_ID'],
									'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
									'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

									'LABEL_PROP' => $arParams['LABEL_PROP'],
									'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
									'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
									'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
									'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
									'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
									'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'3','BIG_DATA':true}]",
									'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
									'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
									'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
									'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
									'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

									"DISPLAY_TOP_PAGER" => 'N',
									"DISPLAY_BOTTOM_PAGER" => 'N',
									"HIDE_SECTION_DESCRIPTION" => "Y",

									"RCM_TYPE" => isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '',
									"SHOW_FROM_SECTION" => 'Y',

									'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
									'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
									'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
									'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
									'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
									'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
									'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
									'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
									'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
									'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
									'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
									'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
									'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
									'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
									'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
									'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE'] ?? '',
									'MESS_NOT_AVAILABLE_SERVICE' => $arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '',
									'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

									'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
									'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
									'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

									'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
									'ADD_TO_BASKET_ACTION' => $basketAction,
									'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
									'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
									'COMPARE_NAME' => $arParams['COMPARE_NAME'],
									'USE_COMPARE_LIST' => 'Y',
									'BACKGROUND_IMAGE' => '',
									'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
								),
								$component
							);?>
						</div>
					</div>
					<?
				}
			}
		}
		unset($basketAction);
?>
<?
$arFilter = Array(
	'IBLOCK_ID' => $arParams['IBLOCK_ID'],
	'ID' => $arResult['VARIABLES']['SECTION_ID'],
	'GLOBAL_ACTIVE' => 'Y'
);

$rsSeoFields = CIBlockSection::GetList(null, $arFilter, false, Array('UF_SEO_BLOCK'));
if($seoFields = $rsSeoFields->GetNext()):
	$seoElementId = $seoFields['UF_SEO_BLOCK'];
endif;
?>






<?if($arResult['VARIABLES']['SECTION_ID'] == 105):?>

	<section class="section section_padding-top_big section_padding-bottom_small">
		<h2 class="section-title section-title_margin_bottom">Фото ёмкостей из пластика TINGERPLAST</h2>
		<ul class="section-gallery">
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-1-big.webp" alt="Подземная ёмкость TINGERPLAST" data-alt="Подземная ёмкость TINGERPLAST">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-1-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-2-big.webp" alt="Подземная ёмкость TINGERPLAST" data-alt="Подземная ёмкость TINGERPLAST">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-2-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-3-big.webp" alt="Подземная ёмкость TINGERPLAST" data-alt="Подземная ёмкость TINGERPLAST">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-3-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-4-big.webp" alt="Подземная ёмкость TINGERPLAST" data-alt="Подземная ёмкость TINGERPLAST">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-4-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-5-big.webp" alt="Подземная ёмкость TINGERPLAST" data-alt="Подземная ёмкость TINGERPLAST">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-5-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-6-big.webp" alt="Подземная ёмкость TINGERPLAST" data-alt="Подземная ёмкость TINGERPLAST">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-6-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-7-big.webp" alt="Подземная ёмкость TINGERPLAST" data-alt="Подземная ёмкость TINGERPLAST">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-7-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-8-big.webp" alt="Подземная ёмкость TINGERPLAST" data-alt="Подземная ёмкость TINGERPLAST">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-gallery-8-small.webp">
				</a>
			</li>
		</ul>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_small">
		<h2 class="section-title section-title_margin_bottom">Технология производства ёмкостей</h2>
		<div class="video">
			<img class="video__bg" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-video-bg.webp" alt="Технологии производства ёмкостей от TINGERPLAST">
			<a class="video__btn glightbox" type="button" href="https://vk.com/video_ext.php?oid=-147829879&id=456239281&hash=eb92186978e1d537&autoplay=1">Открыть видео</a>
		</div>
		<p>Компания TINGERPLAST с 2010 года занимается пластиком, когда начала формовать пластиковые корпуса для своих вездеходов. Затем, в 2014 году мы освоили серийное производство <a href="/plastikovye-pogreba/">бесшовных пластиковых погребов</a>. У нас огромный опыт изготовления пластиковых изделий, бочек, накопительных резервуаров, различной тары и т.п. Пластиковые емкости запустили в 2023 году и сразу получили заказы на производство.</p>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_small">
		<h2 class="section-title section-title_margin_bottom">Монтаж ёмкостей</h2>
		<p>Наши пластиковые ёмкости устанавливаются под землю. При монтаже необходимо следовать рекомендациям. Наши емкости — это универсальный резервуар, который легко устанавливается на большинство видов поверхностей. Дополнительными конструкциями нет необходимости усиливать жесткость емкости.</p>
		<p>Транспортировку до объекта мы осуществляем с помощью логистических компаний и отвечаем за доставку. На объекте при монтаже емкости за транспортировку отвечает клиент.</p>
		<div class="mounting__link-container">
			<a class="mounting__link" href="/upload/iblock/7d0/7fryrr97tv3g3w5cedfh2upqym7a1pvg/Паспорт Емкость_v.4.pdf" download>Скачать паспорт</a>
		</div>
		<ul class="mounting__list">
			<li class="mounting__list-item">
			<div class="mounting__item-overlay">
					<div class="mounting__name-container mounting__name-container_type_underground">
						<span class="mounting__name">Подземный монтаж</span>
					</div>
				</div>
				<img class="mounting__img" src="<?=SITE_TEMPLATE_PATH?>/img/section-tanks-mounting-type-underground.webp" alt="Подземный тип монтажа ёмкости TINGERPLAST">
			</li>
		</ul>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_big">
		<div class="seo-block">
			<h2 class="section-title section-title_margin_bottom">Как заказать и купить пластиковую емкость от 10 до 50 кубов?</h2>
			<div class="seo-block__text text">
				<p>Для того, чтобы купить емкость ТИНГЕРПЛАСТ по цене производителя, ее сначала нужно заказать, так как на складе у нас редко бывают в наличии емкости для хранения жидкостей и других продуктов. Если решили приобрести оптовую партию, то она будет отгружена на более выгодных условиях. Срок производства 30 дней с момента внесения предоплаты.</p>
				<p>При заказе определите необходимость дополнительной комплектации. Она не сильно повлияет на цену емкости, но сэкономит вам средства на монтаже и будущей эксплуатации изделия. Если вы планируете устанавливать емкость глубоко под землю, то вам потребуется дополнительная горловина. Также рекомендуем сразу заказать монтажный комплект.</p>
				<p>Перед тем как купить пластиковую емкость, вам также нужно понимать стоимость доставки. Чтобы рассчитать доставку, следует связаться с нашим менеджером, либо самостоятельно найти логистическую компанию и проконсультироваться с ними. Для связи с менеджером вы можете отправить нам свои данные, заполнив их в форме ниже, либо позвонить по телефону, указанному на сайте.</p>
			</div>
		</div>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_big simple-form">
		<div class="simple-form__inner">
			<div class="simple-form__head">
				<div class="simple-form__title section-title section_margin-bottom_small">Заказать ёмкость</div>
			</div>
			<form class="simple-form__form">
				<input type="hidden" name="title" value="Заказать ёмкость">
				<div class="simple-form__input-container">
					<input class="simple-form__input input input_theme_white" type="text" name="name" placeholder="Имя*" required>
				</div>
				<div class="simple-form__input-container">
					<input class="simple-form__input input input_theme_white" type="tel" name="phone" placeholder="Телефон*" required>
				</div>
				<div class="simple-form__btn-container">
					<button class="simple-form__btn btn btn_type_white" type="submit">Связаться с менеджером</button>
				</div>
				<label class="simple-form__agreement agreement">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox checkbox_theme_white"></span>
					<span class="checkbox__text checkbox__text checkbox__text_theme_white">Я даю <a class="checkbox__link checkbox__link_theme_white" href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a class="checkbox__link checkbox__link_theme_white" href="/privacy-policy/">Политикой обработки персональных данных</a></span>
				</label>
			</form>
		</div>
	</section>

	<section class="section section_padding-top_big section_padding-bottom_small">
		<div class="seo-block">
			<h2 class="section-title section-title_margin_bottom">Для чего используются пластиковые резервуары от TINGERPLAST?</h2>
			<div class="seo-block__text text">
				<ul>
					<li>в пластиковых емкостях можно хранить
						<ul>
							<li>техническую жидкость;</li>
							<li>дождевую воду;</li>
							<li>и др.</li>
						</ul>
					</li>
					<li>могут использовать как накопительные емкости;</li>
					<li>благодаря конструкции, возможно использовать в подземных нишах, котлованах и т.п.</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_small">
		<div class="seo-block">
			<h2 class="section-title section-title_margin_bottom">Часто задаваемые вопросы</h2>
			<div class="seo-block__text text">
				<p>
					<strong>Отличаются ли пластиковые емкости от пластиковых баков?</strong><br>
					Нет. Ничем не отличаются, емкость можно назвать баком, резервуаром, тарой и т.п. Другими производителями эти понятия иногда различаются.
				</p>
				<p>
					<strong>Возможно ли сделать заказ на прямоугольные емкости?</strong><br>
					Нет. Мы не производим прямоугольных, квадратных, круглых или любых других емкостей. Используем только цилиндрическую форму для изготовления продукции.
				</p>
				<p>
					<strong>Производите ли металлические баки, бочки, емкости, резервуары и т.п.</strong><br>
					Нет. Металлическую продукцию не выпускаем. Специализируемся только на продукции из пищевых пластиков.
				</p>
				<p>
					<strong>Какие объемы можно заказать у ваших емкостей.</strong><br>
					Только тот объем, что указан на сайте. Наша компания предлагает емкости от 10000 литров, до 50000 литров. Есть производители, у которых вы можете купить емкости 5000 литров и ниже.
				</p>
			</div>
		</div>
	</section>

<?endif?>


<?if($arResult['VARIABLES']['SECTION_ID'] == 104):?>
	<section class="section section_padding-top_big section_padding-bottom_small">
		<h2 class="section-title section-title_margin_bottom">Сравнение моделей погребов ТИНГАРД</h2>
		<div class="cellar-chars">
			<div class="cellar-chars__table-container">
				<table class="cellar-chars__table">
					<thead>
						<tr class="cellar-chars__table-series">
							<td class="cellar-chars__table-series-name chars__table-series-name_null"></td>
							<th class="cellar-chars__table-series-name" colspan="5">Optimum</th>
							<th class="cellar-chars__table-series-name" colspan="2">Comfort</th>
							<th class="cellar-chars__table-series-name" colspan="2">Prestige</th>
						</tr>
						<tr class="cellar-chars__table-head">
							<td class="cellar-chars__table-model-name chars__table-model-name_null"></td>
							<th class="cellar-chars__table-model-name">S</th>
							<th class="cellar-chars__table-model-name">M</th>
							<th class="cellar-chars__table-model-name">L</th>
							<th class="cellar-chars__table-model-name">XL</th>
							<th class="cellar-chars__table-model-name">XXL</th>
							<th class="cellar-chars__table-model-name cellar-chars__table-model-name_background_light-brown">M</th>
							<th class="cellar-chars__table-model-name cellar-chars__table-model-name_background_light-brown">L</th>
							<th class="cellar-chars__table-model-name cellar-chars__table-model-name_background_light-brown">M</th>
							<th class="cellar-chars__table-model-name cellar-chars__table-model-name_background_light-brown">L</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th class="cellar-chars__table-chars-name">Габариты с горловиной<br>(ДxШxВ, мм)</th>
							<td class="cellar-chars__table-value">1500 <span class="cellar-chars__table-value_type_separator">x</span> 1500 <span class="cellar-chars__table-value_type_separator">x</span> 2500</td>
							<td class="cellar-chars__table-value">1900 <span class="cellar-chars__table-value_type_separator">x</span> 1900 <span class="cellar-chars__table-value_type_separator">x</span> 2700</td>
							<td class="cellar-chars__table-value">2400 <span class="cellar-chars__table-value_type_separator">x</span> 1900 <span class="cellar-chars__table-value_type_separator">x</span> 2700</td>
							<td class="cellar-chars__table-value">2900 <span class="cellar-chars__table-value_type_separator">x</span> 1900 <span class="cellar-chars__table-value_type_separator">x</span> 2700</td>
							<td class="cellar-chars__table-value">3400 <span class="cellar-chars__table-value_type_separator">x</span> 1900 <span class="cellar-chars__table-value_type_separator">x</span> 2700</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">2500 <span class="cellar-chars__table-value_type_separator">x</span> 1900 <span class="cellar-chars__table-value_type_separator">x</span> 2650</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">3000 <span class="cellar-chars__table-value_type_separator">x</span> 1900 <span class="cellar-chars__table-value_type_separator">x</span> 2700</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">2500 <span class="cellar-chars__table-value_type_separator">x</span> 1900 <span class="cellar-chars__table-value_type_separator">x</span> 2700</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">3000 <span class="cellar-chars__table-value_type_separator">x</span> 1900 <span class="cellar-chars__table-value_type_separator">x</span> 2700</td>
						</tr>
						<tr>
							<th class="cellar-chars__table-chars-name">Размеры горловины <br>(ДxШxВ, мм)</th>
							<td class="cellar-chars__table-value">860 <span class="cellar-chars__table-value_type_separator">x</span> 670 <span class="cellar-chars__table-value_type_separator">x</span> 600</td>
							<td class="cellar-chars__table-value">960 <span class="cellar-chars__table-value_type_separator">x</span> 670 <span class="cellar-chars__table-value_type_separator">x</span> 600</td> 
							<td class="cellar-chars__table-value">960 <span class="cellar-chars__table-value_type_separator">x</span> 670 <span class="cellar-chars__table-value_type_separator">x</span> 600</td>
							<td class="cellar-chars__table-value">960 <span class="cellar-chars__table-value_type_separator">x</span> 670 <span class="cellar-chars__table-value_type_separator">x</span> 600</td>
							<td class="cellar-chars__table-value">960 <span class="cellar-chars__table-value_type_separator">x</span> 670 <span class="cellar-chars__table-value_type_separator">x</span> 600</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">1200 <span class="cellar-chars__table-value_type_separator">x</span> 700 <span class="cellar-chars__table-value_type_separator">x</span> 600</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">1200 <span class="cellar-chars__table-value_type_separator">x</span> 700 <span class="cellar-chars__table-value_type_separator">x</span> 600</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">1015 <span class="cellar-chars__table-value_type_separator">x</span> 755 <span class="cellar-chars__table-value_type_separator">x</span> 875</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">1015 <span class="cellar-chars__table-value_type_separator">x</span> 755 <span class="cellar-chars__table-value_type_separator">x</span> 755</td>
						</tr>
						<tr>
							<th class="cellar-chars__table-chars-name">Толщина стенок</th>
							<td class="cellar-chars__table-value" colspan="5">до 15 мм</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown" colspan="4">до 15 мм</td>
						</tr>
						<tr>
							<th class="cellar-chars__table-chars-name">Масса, кг</th>
							<td class="cellar-chars__table-value">410</td>
							<td class="cellar-chars__table-value">600</td>
							<td class="cellar-chars__table-value">680</td>
							<td class="cellar-chars__table-value">800</td>
							<td class="cellar-chars__table-value">900</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">650</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">760</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">650</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown">760</td>
						</tr>
						<tr>
							<th class="cellar-chars__table-chars-name">Герметичность</th>
							<td class="cellar-chars__table-value" colspan="5">100%</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown" colspan="4">100%</td>
						</tr>
						<tr>
							<th class="cellar-chars__table-chars-name">Материал</th>
							<td class="cellar-chars__table-value" colspan="5">пищевой полиэтилен</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown" colspan="4">пищевой полиэтилен</td>
						</tr>
						<tr>
							<th class="cellar-chars__table-chars-name">Срок эксплуатации</th>
							<td class="cellar-chars__table-value" colspan="5">более 100 лет</td>
							<td class="cellar-chars__table-value cellar-chars__table-value_background_light-brown" colspan="4">более 100 лет</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<section class="section section_padding-top_small section_padding-bottom_small">
		<h2 class="section-title section-title_margin_bottom">Комплектация погребов</h2>
		<p>Мы доставляем пластиковые погреба от производителя по всей России, СНГ и странам Европы. Погреб поставляется готовый к эксплуатации, т.е. его нужно только смонтировать, ничего дополнительного покупать не нужно. Дополнительное утепление производить не нужно.</p>
		<div class="cellar-equipment">
			<div class="cellar-equipment__item">
				<p class="cellar-equipment__name">Стандартная комплектация:</p>
				<ul>
					<li>деревянные пол и полки;</li>
					<li>металлический каркас;</li>
					<li>удобная лестница;</li>
					<li>метеостанция;</li>
					<li>современное освещение;</li>
					<li>крышка люк;</li>
					<li>поручень;</li>
					<li>система вентиляции.</li>
				</ul>
			</div>
			<div class="cellar-equipment__item">
				<p class="cellar-equipment__name">Дополнительно можно заказать и установить:</p>
				<ul>
					<li>напольный люк;</li>
					<li>надставную горловину;</li>
					<li>надежный грузовой мини-подъемник;</li>
					<li>винную полку;</li>
					<li>декинг;</li>
					<li>монтажный комплект.</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_small">
		<h2 class="section-title section-title_margin_bottom">Фото погребов из пластика</h2>
		<ul class="section-gallery">
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-1-big.webp">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-1-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-2-big.webp">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-2-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-3-big.webp">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-3-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-4-big.webp">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-4-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-5-big.webp">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-5-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-6-big.webp">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-6-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-7-big.webp">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-7-small.webp">
				</a>
			</li>
			<li class="section-gallery__item">
				<a class="section-gallery__link glightbox" href="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-8-big.webp">
					<img class="section-gallery__img" alt="Фото ёмкости TINGERPLAST" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-gallery-8-small.webp">
				</a>
			</li>
		</ul>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_small">
		<h2 class="section-title section-title_margin_bottom">Технология производства бесшовного пластикового погреба</h2>
		<div class="video">
			<img class="video__bg" src="<?=SITE_TEMPLATE_PATH?>/img/section-cellar-video-bg.webp" alt="Технология производства бесшовного пластикового погреба">
			<a class="video__btn glightbox" href="https://vk.com/video_ext.php?oid=-147829879&id=456239101&hd=2&autoplay=1">Открыть видео</a>
		</div>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_small">
		<h2 class="section-title section-title_margin_bottom">Отзывы о погребах ТИНГАРД от владельцев</h2>
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"reviews-list-section",
			Array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "Y",
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					"DETAIL_TEXT",
					"",
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "46",
				"IBLOCK_TYPE" => "news_tingerplast",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "Y",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "3",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => 131,
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					"AUTHOR",
					"RATING",
					"GALLERY",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N"
			)
		);?>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_small cellar-install">
		<h2 class="section-title section-title_margin_bottom">Монтаж пластиковых погребов за 1 день</h2>

		<p class="cellar-install__before">Качественный монтаж пластикового погреба под землю занимает всего 1 день. Не рекомендуем устанавливать погреб самостоятельно, так как от корректности монтажа зависит срок эксплуатации погреба. Если планируете самостоятельно устанавливать погреб, то делайте это по инструкции от производителя. Если бесшовный погреб установлен с нарушениями, то он может всплыть, может оказаться деформированным или могут возникнуть другие проблемы.</p>
	
		<div class="video">
			<img class="video__bg" src="<?=SITE_TEMPLATE_PATH?>/img/section-install-cellar-video-bg.webp" alt="Монтаж пластиковых погребов за 1 день">
			<a class="video__btn glightbox" type="button" href="https://vk.com/video_ext.php?oid=-147829879&id=456239034&hd=2&autoplay=1">Открыть видео</a>
		</div>

		<p class="cellar-install__after">Монтаж погреба возможен под землю на открытом участке вашей дачи, а также под любое строение, например, под гаражом, домом, сараем и другими помещениями. Для погребов с боковым входом при монтаже следует учитывать, что вход в погреб будет над землей. Устанавливать пластиковый погреб возможно в различный грунт и при различном уровне грунтовых вод. Цена монтажа погреба рассчитывается отдельно. Погреб можно установить и в иное помещение, если вы собираетесь его использовать не по назначению.</p>

		<p class="cellar-install__subtitle">Очередность при монтаже:</p>

		<ul class="cellar-install__list">
			<li class="cellar-install__list-item">Роется котлован.</li>
			<li class="cellar-install__list-item">В котлован устанавливается бетонная плита (или заливается цемент).</li>
			<li class="cellar-install__list-item">К плите крепятся монтажные тросы.</li>
			<li class="cellar-install__list-item">Устанавливают пластиковый погреб и закрепляют его тросами к плите..</li>
			<li class="cellar-install__list-item">Вся конструкция засыпается обратно землей.</li>
			<li class="cellar-install__list-item">Над котлованом формируется горка.</li>
			<li class="cellar-install__list-item">Сразу после завершения монтажа в погреб можно загружать овощи, фрукты и другие запасы.</li>
		</ul>

		<p class="cellar-install__after">Наши менеджеры по продажам помогут подобрать вам проверенную монтажную организацию в вашем регионе, чтобы выполнили монтаж под ключ. Все компании, которые мы предлагаем, провели большое количество установок нашего погреба, поэтому мы доверяем их опыту. Также специалисты могут помочь вам выбрать подходящий погреб, который можно установить на <a href="/plastikovye-pogreba/dlya-dachi/">дачу</a>, в <a href="/plastikovye-pogreba/dlya-zagorodnogo-doma/">загородный дом</a> иди другой подходящий участок. Рассчитать доставку вы можете самостоятельно, обратившись в логистические компании, либо наши логисты помогут вам в этом.</p>

		<img src="<?=SITE_TEMPLATE_PATH?>/img/section-tingard-vertical.webp" alt="Смонтированный погреб ТИНГАРД">


	</section>

	<section class="section section_padding-top_small section_padding-bottom_big">
		<div class="seo-block">
			<h2 class="section-title section-title_margin_bottom">Как заказать и купить пластиковый погреб от производителя TINGERPLAST</h2>
			<div class="seo-block__text text">
				<p>Если вы ещё выбираете какой погреб купить – пластиковый, бетонный или кирпичный, сварной или бесшовный, то рекомендуем вам изучить данную тему подробней, после чего заказать погреб через наш сайт или позвонить нам и решить, наконец, проблему хранения урожая.</p>
				<p>Погреба TINGARD – это эталон среди бесшовных пластиковых. Наши погреба надёжны и проверены временем. У нас огромное количество отзывов, дилеры по всей России, СНГ и восточной Европе. Благодаря оптимальной стоимости и качеству мы достигли таких показателей.</p>
				<p>Наша сервисная служба всегда на связи и ответит вам на все вопросы по покупке, комплектации, выбору, монтажу и использованию бесшовных погребов. На наших погребах от производителя есть маркировка TINGARD или TINGERPLAST! По ней нас можно отличить от погребов, производителями которых являются мошенники, выдающие свою продукцию за нашу. Также, как правило, цена пластиковых погребов, выдаваемых за TINGARD ниже в 2-3 раза, чем цена от производителя TINGERPLAST.</p>
				<p>Доставка погребов осуществляется транспортными компаниями с завода в Череповце или со складов в Москве, Санкт-Петербурге и Екатеринбурге. Также возможна доставка из других регионов от наших дилеров.</p>
			</div>
		</div>
	</section>

	<section class="section section_padding-top_small section_padding-bottom_small simple-form">
		<div class="simple-form__inner">
			<div class="simple-form__head">
				<div class="simple-form__title section-title section_margin-bottom_small">Заказать погреб</div>
			</div>
			<form class="simple-form__form">
				<input type="hidden" name="title" value="Заказать погреб">
				<div class="simple-form__input-container">
					<input class="simple-form__input input input_theme_white" type="text" name="name" placeholder="Имя*" required>
				</div>
				<div class="simple-form__input-container">
					<input class="simple-form__input input input_theme_white" type="tel" name="phone" placeholder="Телефон*" required>
				</div>
				<div class="simple-form__btn-container">
					<button class="simple-form__btn btn btn_type_white" type="submit">Связаться с менеджером</button>
				</div>
				<label class="simple-form__agreement agreement">
					<input class="checkbox__input" type="checkbox" name="policy" required>
					<span class="checkbox checkbox_theme_white"></span>
					<span class="checkbox__text checkbox__text checkbox__text_theme_white">Я даю <a class="checkbox__link checkbox__link_theme_white" href="/agreement-policy/">Согласие на обработку персональных данных</a> в соответствии с <a class="checkbox__link checkbox__link_theme_white" href="/privacy-policy/">Политикой обработки персональных данных</a></span>
				</label>
			</form>
		</div>
	</section>

	<section class="section section_padding-top_big section_padding-bottom_big">
		<div class="seo-block">
			<h2 class="section-title section-title_margin_bottom">Чем отличается пластиковый погреб от производителя TINGERPLAST от погребов других производителей</h2>
			<div class="seo-block__text text">
				<p>Сначала давайте определимся, что TINGARD – это название погреба, а TINGERPLAST – это компания, которая производит пластиковые погреба и другие пластиковые изделия. На рынке существует еще немало брендов и нам часто задают вопрос, чем мы отличаемся от погребов Титан, погребов Гудвэй, Гринлос и т.д.</p>
				<p>Решение работать с пластиком возникло у нас в 2013 году, а в 2014 мы уже запустили серийное производство бесшовных пластиковых погребов TINGARD для хранения пищевых продуктов. Мы решили сделать именно бесшовные погреба, так как понимали преимущества полностью герметичных моделей. В то время на рынке уже были погреба из сварного пластика, от того же Титана, были и сварные кессоны, но бесшовных не было. Мы первые кто сделал такой продукт и запатентовали технологию его производства. </p>
				<p>Мы остановились только на бесшовных моделях пластиковых погребов. Цены на такие погреба не ниже бетонных или сварных пластиковых, но если купить пластиковый погреб, то вы обеспечите качественное хранение урожая на долгие годы, вам не нужно будет тратить время и деньги на дополнительное обслуживание, а в самом погребе будет приятно находиться.</p>
				<img src="<?=SITE_TEMPLATE_PATH?>/img/section-tingard-horizontal.webp" alt="Смонтированный погреб ТИНГАРД">
				<p>В 2023 компания расширила производство и запустили линию <a href="/plastikovye-yemkosti/">пластиковых емкостей</a>, они также бесшовные и имеют объем от 10 до 50 кубов. В планах запуск производства пластиковых кессонов для скважин.</p>
				<p>В отличии от бетонных погребов, пластиковые имеют ряд преимуществ. Например:</p>
				<ul>
					<li>пластиковый погреб можно установить за один день;</li>
					<li>бетон подвержен сырости и образованию плесени, а пластик нет;</li>
					<li>меньше требований к котловану для установки погреба;</li>
					<li>весь погреб и его комплектация изготавливаются на заводе, на место установки привозят уже готовый погреб.</li>
				</ul>
				<p>Перед сварными пластиковыми погребами, бесшовные обладают преимуществом за счет того, что обеспечивают герметичность. Исследования показывают, что заказы на покупку бесшовных пластиковых погребов растут по сравнению со сварными. Стоимостью они идентичны, но в плане качества и срока службы, лучше – бесшовные.</p>
			</div>
		</div>
	</section>
<?endif?>





<?if($seoElementId <> ''):?>
<section class="section section_padding-top_big section_padding-bottom_small">
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.detail", 
		"seo.catalog", 
		array(
			"COMPONENT_TEMPLATE" => "seo.catalog",
			"IBLOCK_TYPE" => "content_tingerplast",
			"IBLOCK_ID" => 43,
			"ELEMENT_ID" => $seoElementId,
			"ELEMENT_CODE" => "",
			"CHECK_DATES" => "Y",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"IBLOCK_URL" => "",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_GROUPS" => "Y",
			"SET_TITLE" => "N",
			"SET_CANONICAL_URL" => "N",
			"SET_BROWSER_TITLE" => "N",
			"BROWSER_TITLE" => "-",
			"SET_META_KEYWORDS" => "N",
			"META_KEYWORDS" => "-",
			"SET_META_DESCRIPTION" => "N",
			"META_DESCRIPTION" => "-",
			"SET_LAST_MODIFIED" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_ELEMENT_CHAIN" => "N",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"USE_PERMISSIONS" => "N",
			"STRICT_SECTION_CHECK" => "N",
			"PAGER_TEMPLATE" => ".default",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "Страница",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"SET_STATUS_404" => "N",
			"SHOW_404" => "N",
			"MESSAGE_404" => ""
		),
		false
	);?>
</section>
<?endif?>