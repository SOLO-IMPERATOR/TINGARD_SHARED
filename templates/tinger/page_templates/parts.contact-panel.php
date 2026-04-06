<?

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/components/contact-panel.css');

?>

<div class="contact-panel">
	<div class="container">
		<div class="contact-panel__inner">
			<div class="contact-panel__delivery">
				<a class="contact-panel__link" href="/delivery/">Доставка и оплата</a>
			</div>
			<div class="contact-panel__email-container">
				<a class="contact-panel__link" href="mailto:parts@tinger.ru">parts@tinger.ru</a>
			</div>
			<div class="contact-panel__phone-container">
				<a class="contact-panel__link" href="tel:88003502505">8 (800) 350-25-05</a> — <span class="contact-panel__phone-text">доб. 701</span>
			</div>
		</div>
	</div>
</div>