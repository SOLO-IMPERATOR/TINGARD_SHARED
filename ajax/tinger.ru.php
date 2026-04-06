<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

/* Проверка reCAPTCHA */

/* function verifyRecaptcha($recaptchaToken) {
    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
    $recaptchaSecret = '6LdzNJ0qAAAAALqbTPGJew-vfLjsIpGgHcf7Yw2P';
    $recaptcha_response = $recaptchaToken;
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptchaSecret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    return $recaptcha->score >= 0.4 ? true : false;
}
 */
// Получаем токен из POST-запроса
/* $recaptchaToken = $_POST['token']; */

// Если токен не прошёл проверку, возвращаем ошибку
/* if (!$recaptchaToken || !verifyRecaptcha($recaptchaToken)) {
    echo json_encode(['message' => 'Ошибка: Проверка reCAPTCHA не пройдена.']);
    exit;
}
 */

/* функция отправки лида на email */
function sendLeadEmail($data) {
	$fromEmail = 'lid@tinger.ru';
	$toEmail = 'tinger35@yandex.ru';
	$subject = "Лид с сайта TINGER.RU";
	$message = "<b>Форма:</b> " . $data['TITLE'] . "<br>\n";
	$message .= "<b>Имя:</b> " . $data['NAME'] . "<br>\n";

	if(isset($data['PHONE'][0]['VALUE'])) {
		$message .= "<b>Телефон:</b> " . $data['PHONE'][0]['VALUE'] . "<br>\n";
	}

	if(isset($data['EMAIL'][0]['VALUE'])) {
		$message .= "<b>Email:</b> " . $data['EMAIL'][0]['VALUE'] . "<br>\n";
	}

	if(isset($data['COMMENTS'])) {
		$message .= "<b>Сообщение:</b> <br>" . $data['COMMENTS'];
	}    

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: ' . $fromEmail . "\r\n" .
			'Reply-To: ' . $fromEmail . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

	$success = mail($toEmail, $subject, $message, $headers);

	if ($success) {
		echo "Письмо успешно отправлено.";
	} else {
		echo "Ошибка при отправке письма.";
	}
}


/* функция поиска существующего контакта */
function findDuplicate($data) {
	$result = CRest::call(
		"crm.duplicate.findbycomm",
		[
			'entity_type' => "CONTACT",
			'type' => "PHONE",
			'values' => [$data["PHONE_WORK"][0]["VALUE"]]
		]
	);
	return $result;
}

/* функция создания контакта */
function creationContact($data) {
	$dubl = findDuplicate($data);
	$contact = false;

	if (empty($dubl["result"]["CONTACT"])) {
		$result = CRest::call(
			"crm.contact.add",
			[
				"fields" => [
					'UF_CRM_566E8F1A1E899' => 170,
					'ASSIGNED_BY_ID' => isset($data['ASSIGNED_BY_ID']) && $data['ASSIGNED_BY_ID'] !== '' ? $data['ASSIGNED_BY_ID'] : 190,
					'PHONE' =>  $data['PHONE'],
					'EMAIL' => $data['EMAIL'],
					'NAME' => $data['NAME'],
				]
			]
		);

		$contact = $result['result'];
	} else {
		if (count($dubl['result']['CONTACT']) > 1) {
			$contact = $dubl['result']['CONTACT'][0];
		} else {
			$contact = $dubl['result']['CONTACT'];
		}
	}

	return  $contact;
}

/* функция создания лида */
function createLead($data) {
	$resultLead = CRest::call(
		'crm.lead.add',
		[
			'fields' => $data
		]
	);

	if (!empty($resultLead['result'])) {
		echo json_encode(['message' => 'Lead add']);
		return $resultLead['result'];
	} elseif (!empty($resultLead['error_description'])) {
		echo json_encode(['message' => 'Lead not added: ' . $resultLead['error_description']]);
	} else {
		echo json_encode(['message' => 'Lead not added']);
	}
}

/* функция создания сделки */
function createDeal($data) {
	$data['CONTACT_ID'] = creationContact($data);
	$resultDeal = CRest::call(
		'crm.deal.add',
		[
			'fields' => $data
		]
	);

	if (!empty($resultDeal['result'])) {
		echo json_encode(['message' => 'Lead add']);
		return $resultDeal['result'];
	} elseif (!empty($resultDeal['error_description'])) {
		echo json_encode(['message' => 'Deal not added: ' . $resultDeal['error_description']]);
	} else {
		echo json_encode(['message' => 'Deal not added']);
	}
}

if($_POST['name']){
/* присвоение значений для отправки в CRM */
$data['NAME'] = $_POST['name'];
$data['PHONE'] = [['VALUE' => $_POST['phone'], 'VALUE_TYPE' => 'WORK']];
$data['EMAIL'] = [['VALUE' => $_POST['email'], 'VALUE_TYPE' => 'WORK']];
$data['TRACE'] = $_POST['trace'];
$data['UF_CRM_1736853511'] = $_POST['metrikaclientid']; //лид
$data['UF_CRM_1736853555'] = $_POST['metrikaclientid']; //сделка
$data['UF_CRM_1736853537'] = $_POST['metrikaclientid']; //контакт
$data['UF_CRM_1517561552'] = array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : 'nocookie';
$utm = json_decode($data['TRACE'], true);
if ($_POST['promo'] === 'true') {
	$data['COMMENTS'] = 'Есть промокод: ' . $utm['tags']['list']['utm_campaign'] . '<br>';
	$data['COMMENTS'] .= $_POST['comments'];
	$data['UF_CRM_1699518130'] = $utm['tags']['list']['utm_campaign'];
} else {
	$data['COMMENTS'] = $_POST['comments'];
}
unset($utm);
/* сделка или лид */
switch ($_POST['crm-entity']) {
	case 'lead':
		$data['TITLE'] = isset($_POST['crm-title']) ? $_POST['crm-title'] : 'Новый лид';
		$data['UF_CRM_1449663065'] = isset($_POST['crm-sale-direction']) && $_POST['crm-sale-direction'] !== '' ? $_POST['crm-sale-direction'] : 64;
		$data['ASSIGNED_BY_ID'] = isset($_POST['crm-responsible']) && $_POST['crm-responsible'] !== '' ? $_POST['crm-responsible'] : 58;
		$data['SOURCE_ID'] = 'WEB';
		sendLeadEmail($data);
		createLead($data);
		if ($_POST['action'] == 'get-conf-data') {

			$to = $_POST['email'];
			$subject = 'Ваша комплектация TINGER';
			$message = $_POST['comments'];
			$headers = 'From: info@tinger.ru' . "\r\n" .
				'Reply-To: info@tinger.ru' . "\r\n" .
				'Content-Type: text/html; charset=UTF-8' . "\r\n";

			mail($to, $subject, $message, $headers);
		}
	break;
	case 'tingard-lead':
		$data['TITLE'] = isset($_POST['crm-title']) ? $_POST['crm-title'] : 'Заявка от КЦ';
		$data['UF_CRM_1449663065'] = isset($_POST['crm-sale-direction']) ? $_POST['crm-sale-direction'] : 68;
		$data['ASSIGNED_BY_ID'] = isset($_POST['crm-responsible']) ? $_POST['crm-responsible'] : 58;
		$data['SOURCE_ID'] = '102';
		sendLeadEmail($data);
		createLead($data);
	break;
	case 'tinger-lead':
		$data['TITLE'] = isset($_POST['crm-title']) ? $_POST['crm-title'] : 'Заявка от КЦ';
		$data['UF_CRM_1449663065'] = isset($_POST['crm-sale-direction']) ? $_POST['crm-sale-direction'] : 64;
		$data['ASSIGNED_BY_ID'] = isset($_POST['crm-responsible']) ? $_POST['crm-responsible'] : 58;
		$data['SOURCE_ID'] = '102';
		sendLeadEmail($data);
		createLead($data);
	break;
	case 'deal':
		$data['TITLE'] = isset($_POST['crm-title']) ? $_POST['crm-title'] : 'Новая сделка';
		$data['CATEGORY_ID'] = isset($_POST['crm-category']) ? $_POST['crm-category'] : 6;
		$data['UF_CRM_5697ACD86C4A4'] = $_POST['model'];
		$data['UF_CRM_1580391801'] = $_POST['location'];
		$data['UF_CRM_1558422147767'] = $_POST['mileage'];
		$data['UF_CRM_1558422105224'] = $_POST['engine'];
		$data['UF_CRM_1558421988817'] = $_POST['frame'];
		$data['UF_CRM_1558443579026'] = $_POST['date'];
		$data['SOURCE_ID'] = 'WEB';
		sendLeadEmail($data);
		createDeal($data);
		break;
	case 'vacancy-deal':
		$data['TITLE'] = isset($_POST['crm-title']) ? $_POST['crm-title'] : 'Новая сделка';
		$data['CATEGORY_ID'] = 26;
		$data['SOURCE_ID'] = 'WEB';
		$data['ASSIGNED_BY_ID'] = isset($_POST['crm-responsible']) ? $_POST['crm-responsible'] : 50856;
		$data['UF_CRM_5742B4FC41290'] = $_POST['crm-work'];
		sendLeadEmail($data);
		createDeal($data);
		break;

	case 'feedback':

		$answer = filter_var($_POST['feedback-answer'], FILTER_SANITIZE_STRING);
		$text = date('m.d.Y G:i:s') . ' | Сайт: TINGER.RU | Ответ: ' . $answer . ' | Комментарий: ' . $_POST['comments'] . PHP_EOL;
		$file = '/var/www/bitrix/data/www/tinger.ru/tinger-ru-answers.txt';
		file_put_contents($file, $text, FILE_APPEND);
	
		break;
	default:
		return;
}


}