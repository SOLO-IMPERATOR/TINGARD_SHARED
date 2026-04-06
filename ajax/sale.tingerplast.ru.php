<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

/* функция отправки лида на email */
function sendLeadEmail($data) {
	$fromEmail = 'lid@tinger.ru';
	$toEmail = 'tinger35@yandex.ru';
	$subject = "Лид с сайта SALE.TINGERPLAST.RU";
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

/* присвоение значений для отправки в CRM */
$data['NAME'] = $_POST['name'];
$data['PHONE'] = [['VALUE' => $_POST['phone'], 'VALUE_TYPE' => 'WORK']];
$data['EMAIL'] = [['VALUE' => $_POST['email'], 'VALUE_TYPE' => 'WORK']];
$data['COMMENTS'] = $_POST['comments'];
$data['TRACE'] = $_POST['trace'];
$data['UF_CRM_1517561552'] = array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : 'nocookie';

/* сделка или лид */
switch ($_POST['crm-entity']) {
	case 'lead':
		$data['TITLE'] = isset($_POST['crm-title']) ? $_POST['crm-title'] : 'Новый лид';
		$data['UF_CRM_1449663065'] = 9600;
		$data['ASSIGNED_BY_ID'] = 58;
		$data['SOURCE_ID'] = 58;
		sendLeadEmail($data);
		createLead($data);
	break;
	default:
		return;
}


