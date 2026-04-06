<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

/* функция отправки лида на email */
function sendLeadEmail($data) {
	$fromEmail = 'lid@tinger.ru';
	$toEmail = 'tinger35@yandex.ru';
	$subject = "Лид с сайта SALE.TINGARD.RU";
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
					'UF_CRM_566E8F1A1E899' => 174,
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

/* присвоение значений для отправки в CRM */
$data['NAME'] = $_POST['name'];
$data['PHONE'] = [['VALUE' => $_POST['phone'], 'VALUE_TYPE' => 'WORK']];
$data['EMAIL'] = [['VALUE' => $_POST['email'], 'VALUE_TYPE' => 'WORK']];
$data['COMMENTS'] = $_POST['comments'];
$data['TRACE'] = $_POST['trace'];

/* сделка или лид */
switch ($_POST['crm-entity']) {
	case 'lead':
		$data['TITLE'] = isset($_POST['crm-title']) ? $_POST['crm-title'] : 'Новый лид';
		$data['UF_CRM_1449663065'] = isset($_POST['crm-sale-direction']) && $_POST['crm-sale-direction'] !== '' ? $_POST['crm-sale-direction'] : 68;
		$data['ASSIGNED_BY_ID'] = isset($_POST['crm-responsible']) && $_POST['crm-responsible'] !== '' ? $_POST['crm-responsible'] : 58;
		$data['SOURCE_ID'] = 85;
		sendLeadEmail($data);
		createLead($data);
	break;
	default:
		return;
}


