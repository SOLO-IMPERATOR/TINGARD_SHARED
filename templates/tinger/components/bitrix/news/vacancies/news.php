<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetPageProperty('header-class', 'header_margin_bottom-minus header_background_transparent');
$this->setFrameMode(true);?>


<main>
	<div class="container">
		<div class="breadcrumb-container breadcrumb-container_position_absolute">
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb", 
				"main.breadcrumb", 
				array(
					"START_FROM" => "0",
					"PATH" => "",
					"SITE_ID" => "s2",
					"COMPONENT_TEMPLATE" => "main.breadcrumb"
				),
				false
			);?>
		</div>
	</div>
	<section class="vacancies-intro">
		<div class="vacancies-intro__img-container">
			<picture>
				<source media="(max-width: 480px)" srcset="<?=SITE_TEMPLATE_PATH?>/img/vacancies-intro-480-768.webp">
				<source media="(max-width: 768px)" srcset="<?=SITE_TEMPLATE_PATH?>/img/vacancies-intro-768-768.webp">
				<img class="vacancies-intro__img" src="<?=SITE_TEMPLATE_PATH?>/img/vacancies-intro.webp" alt="Работа в TINGER">
			</picture>
		</div>
		<div class="vacancies-intro__body container">
			<h1 class="vacancies-intro__title title">Вакансии в Череповце в группе компаний TINGER</h1>
			<p class="vacancies-intro__subtitle section-title">Преимущества работы в нашей компании:</p>
			<ul class="vacancies-intro__list">
				<li class="vacancies-intro__list-item section-subtitle">— делимся опытом с новичками;</li>
				<li class="vacancies-intro__list-item section-subtitle">— вознаграждения за идеи;</li>
				<li class="vacancies-intro__list-item section-subtitle">— масштабные и интересные задачи;</li>
				<li class="vacancies-intro__list-item section-subtitle">— не только вместе работаем, но и отдыхаем;</li>
				<li class="vacancies-intro__list-item section-subtitle">— уверенность в завтрашнем дне.</li>		
			</ul>
			<div class="vacancies-intro__btn-container">
				<button class="btn btn_color_green" type="button" onclick="scrollToSection();">Посмотреть вакансии</button>
			</div>
		</div>
	</section>
	<section id="vacancies" class="section section_padding_top_big section_padding_bottom_small container">
		<h2 class="section-title section-title_margin_bottom">Куда мы приглашаем</h2>
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"vacancies.section.list",
			Array(
				"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",		
				"VIEW_MODE" => "TEXT",
				"SHOW_PARENT_NAME" => "Y",
				"IBLOCK_TYPE" => "news",
				"IBLOCK_ID" => "21",
				"SECTION_ID" => "0",
				"SECTION_CODE" => "",
				"SECTION_URL" => "/vacancies/#SECTION_CODE#/",
				"COUNT_ELEMENTS" => "Y",
				"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
				"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
				"TOP_DEPTH" => "2",
				"SECTION_FIELDS" => "",
				"SECTION_USER_FIELDS" => "",
				"ADD_SECTIONS_CHAIN" => "Y",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_NOTES" => "",
				"CACHE_GROUPS" => "Y"
			)
		);?>
	</section>
	<section class="section section_padding_top_small section_padding_bottom_small container">
		<h2 class="section-title section-title_margin_bottom">Видео о компании</h2>
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.detail",
			"video.block",
			Array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"ADD_ELEMENT_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"BROWSER_TITLE" => "-",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"CHECK_DATES" => "Y",
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_CODE" => "",
				"ELEMENT_ID" => 1720,
				"FIELD_CODE" => array(
					""
				),
				"IBLOCK_ID" => 27,
				"IBLOCK_TYPE" => "catalog",
				"IBLOCK_URL" => "",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"MESSAGE_404" => "",
				"META_DESCRIPTION" => "-",
				"META_KEYWORDS" => "-",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_TEMPLATE" => "",
				"PAGER_TITLE" => "Страница",
				"PROPERTY_CODE" => array(
					"YOUTUBE_LINK"
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_CANONICAL_URL" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"STRICT_SECTION_CHECK" => "N",
				"USE_PERMISSIONS" => "N",
				"USE_SHARE" => "N"
			)
		);?>
	</section>
	<section class="section section_padding_top_small">
		<div class="container">
			<p>Мы — современный машиностроительный завод. Производим вездеходы, бесшовные пластиковые погреба и листовой пластик. Нашими продуктами пользуются в России и 33 странах. Вездеходами пользуются в т. ч. и «Газпроме», «Россетях, «Роснефти», «Объединенных региональных электрических сетях», их используют спасатели в Китае, пожарные в Японии, полицейские в Чили и Колумбии. Мы гордимся тем, что уже смогли сделать, и не останавливаемся на достигнутом, постоянно улучшая наши продукты, что позволяет нам расти из года в год, не смотря на катаклизмы последних лет. На предприятии работают более 180 сотрудников. В нашей группе ВКонтакте вы увидите наши фото и видео.</p>
		</div>
	</section>
	<section class="section section_padding_top_small section_padding_bottom_small container">
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list", 
			"numbers", 
			array(
				"SET_TITLE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
			),
			false
		);?>
	</section>
	<section class="team section section_padding_bottom_small section_padding_top_small">
		<div class="container">
			<h2 class="section-title section-title_margin_bottom">Наша команда</h2>
		</div>
		<?$APPLICATION->IncludeComponent(
			"tinger:about.page",
			"team.block",
			Array()
		);?>
	</section>
	<section class="section section_padding_top_small section_padding_bottom_small contact-form">
		<div class="container contact-form__inner">
			<div class="contact-form__title-container">
				<h2 class="contact-form__title section-title">Если вы хотите работать у нас, но не определились с вакансией, заполните заявку и мы с вами свяжемся</h2>
			</div>
			<form class="contact-form__body" data-entity="form">
				<input type="hidden" name="crm-entity" value="vacancy-deal">
				<input type="hidden" name="crm-title" value="Хочу работать у вас, но не определился с вакансией">
				<input type="hidden" name="action" value="create-vacancies-deal">
				<div class="contact-form__fields">
					<label class="form-label">
						<span class="form-input-name">Имя и фамилия: *</span>
						<input class="form-input" type="text" name="name" required>
					</label>
					<label class="form-label">
						<span class="form-input-name">Телефон: *</span>
						<input class="form-input" type="tel" name="phone" required>
					</label>
					<label class="form-label">
						<span class="form-input-name">Email:</span>
						<input class="form-input" type="email" name="email">
					</label>
				</div>
				<div class="contact-form__textarea-field">
					<label class="form-label">
						<span class="form-input-name">Расскажите о ваших навыках: *</span>
						<textarea class="form-textarea" name="comments" required></textarea>
					</label>
				</div>
				<label class="form-agreement checkbox-container">
					<input class="checkbox-input" type="checkbox" name="policy" required="">
					<span class="checkbox-area"></span>
					<span class="checkbox-text form-agreement__checkbox-text">Нажимая на кнопку «Отправить», я даю согласие на обработку моих <a href="/privacy-policy/">персональных данных</a></span>
				</label>
				<button class="btn btn_color_green" type="submit">Отправить</button>
			</form>
		</div>
	</section>
	<section class="section container section_padding_top_small section_padding_bottom_big html">
		<p>На этой странице мы публикуем «горячие» вакансии в нашей компании. По всем вакансиям, вы можете обратиться по номеру, указанному в шапке сайта или написать на почту <a href="mailto:rabota@tinger.ru">rabota@tinger.ru</a>.</p>
		<p>Также все актуальные вакансии вы можете посмотреть на нашей страничке на hh — <a href="https://hh.ru/employer/1581674" target="_blank">hh.ru/employer/1581674</a>.</p>
	</section>
</main>