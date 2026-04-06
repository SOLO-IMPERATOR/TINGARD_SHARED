<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="rim-intro">

	<div class="rim-intro__breadcrumb container">
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

	<div class="container rim-intro__inner">
		<div class="rim-intro__title-container">
			<h1 class="page-title margin_b_m">Производство дисков для шин низкого давления</h1>
		</div>
		<div class="rim-intro__subtitle-container margin_b_m">В наличии и на заказ. Продажа в розницу и оптом. Доставка по РФ.</div>
		<div class="rim-intro__btn-container">
		<button class="btn btn_color_green" type="button" onclick="openModal('rim-quiz', {'crm-entity': 'lead', 'crm-title': 'Подбор пневмодиска по размерам', 'crm-sale-direction': '16522', 'action': 'get-rim-quiz-data'}, 'Какой диск вам нужен?')">Подобрать диск</button>
		</div>
	</div>

</section>