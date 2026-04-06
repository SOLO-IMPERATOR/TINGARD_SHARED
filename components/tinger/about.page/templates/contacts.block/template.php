<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<div itemscope itemtype="http://schema.org/Organization">
	<ul class="contacts__list margin_b_m">
		<li class="contacts__item">
			<div class="contacts__email">
				<p class="contacts__email-tagline">По всем вопросам</p>
				<a itemprop="email" class="contacts__link section-subtitle" href="mailto:<?=tag_replacement("#email_question#")?>"><?=tag_replacement("#email_question#")?></a>
			</div>
			<div class="contacts__phone">
				<p class="contacts__phone-tagline">09:00 — 18:00 (CБ, ВС — выходной)</p>
				<a itemprop="telephone" class="contacts__link section-subtitle" href="tel:<?=tag_replacement("#phone_question#")?>"><?=tag_replacement("#phone_question#")?></a>
			</div>
		</li>
		<li class="contacts__item">
			<div class="contacts__email">
				<p class="contacts__email-tagline">Отдел сервисного обслуживания</p>
				<a class="contacts__link section-subtitle" href="mailto:<?=tag_replacement("#email_service#")?>"><?=tag_replacement("#email_service#")?></a>
			</div>
			<div class="contacts__phone">
				<p class="contacts__phone-tagline">08:00 — 17:00 (CБ, ВС — выходной)</p>
				<a class="contacts__link section-subtitle" href="tel:<?=tag_replacement("#phone_service#")?>"><?=tag_replacement("#phone_service#")?></a>
				<p class="contacts__phone-tagline">доб. 702</p>
			</div>
		</li>
		<li class="contacts__item">
			<div class="contacts__email">
				<p class="contacts__email-tagline">Отдел маркетинга и PR</p>
				<a class="contacts__link section-subtitle" href="mailto:<?=tag_replacement("#email_marketing#")?>"><?=tag_replacement("#email_marketing#")?></a>
			</div>
			<div class="contacts__phone">
				<p class="contacts__phone-tagline">09:00 — 18:00 (CБ, ВС — выходной)</p>
				<a class="contacts__link section-subtitle" href="tel:<?=tag_replacement("#phone_marketing#")?>"><?=tag_replacement("#phone_marketing#")?></a>
				<p class="contacts__phone-tagline">доб. 555</p>
			</div>
		</li>
	</ul>

	<h2 class="section-title section-title_margin_bottom">Реквизиты</h2>

	<div class="contacts__organization-card margin_b_m">
		<div class="contacts__organization-card-item">
			<div class="contacts__organization-card-name">Полное наименование юридического лица:</div>
			<div class="contacts__organization-card-value">Общество с ограниченной ответственностью «Механика»</div>
		</div>
		<div class="contacts__organization-card-item">
			<div class="contacts__organization-card-name">Юридический адрес:</div>
			<div class="contacts__organization-card-value">162611, область Вологодская, город Череповец, ул. Окружная, дом 18, строение 6, офис 1</div>
		</div>
		<div class="contacts__organization-card-item">
			<div class="contacts__organization-card-name">Фактический адрес:</div>
			<div class="contacts__organization-card-value">162611, область Вологодская, город Череповец, ул. Окружная, дом 18, строение 6, офис 1</div>
		</div>
		<div class="contacts__organization-card-item">
			<div class="contacts__organization-card-name">Для писем:</div>
			<div class="contacts__organization-card-value">162608, г. Череповец, а/я 78</div>
		</div>
		<div class="contacts__organization-card-item">
			<div class="contacts__organization-card-name">ИНН/КПП:</div>
			<div class="contacts__organization-card-value">3528228802/352801001</div>
		</div>
		<div class="contacts__organization-card-item">
			<div class="contacts__organization-card-name">ОГРН:</div>
			<div class="contacts__organization-card-value">1153525008670</div>
		</div>
	</div>

	<div class="contacts__requisites">
		<meta itemprop="name" content="<?=tag_replacement("#organization#")?>">
		<link itemprop="url" href="https://tinger.ru">
		<address itemprop="address" itemscope itemtype="https://schema.org/PostalAddress" class="contacts__address margin_b_s section-subtitle">
			<span itemprop="postalCode">162611</span>, 
			<span itemprop="addressCountry"><?=tag_replacement("#address_country#")?></span>, 
			<span itemprop="addressRegion"><?=tag_replacement("#address_region#")?></span>, 
			<span itemprop="addressLocality"><?=tag_replacement("#address_city#")?></span>, 
			<span itemprop="streetAddress"><?=tag_replacement("#address_street#")?></span>
		</address>
	</div>
</div>