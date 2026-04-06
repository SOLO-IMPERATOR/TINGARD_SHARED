<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

/* функция отправки лида на email */
function sendLeadEmail($data) {
	$fromEmail = 'lid@tinger.ru';
	$toEmail = 'tinger35@yandex.ru';
	$subject = "Лид с сайта QUIZ.TINGARD.RU";
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


function creationContact($data) {
	$dubl = findDuplicate($data);
	$contact = false;

	if (empty($dubl["result"]["CONTACT"])) {
		$result = CRest::call(
			"crm.contact.add",
			[
				"fields" => [
					'UF_CRM_566E8F1A1E899' => 16456, //направление продаж (контакты)
					"PHONE" =>  [["VALUE" => $data["PHONE_WORK"], "VALUE_TYPE" => "WORK"]], //телефон
					"EMAIL" =>  [["VALUE" => $data["EMAIL_WORK"], "VALUE_TYPE" => "WORK"]], //почта
					'NAME' => $data["NAME"], //имя контакта
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

function creationLead($data) {
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


$data['UF_CRM_1449663065'] = 68;
$data['SOURCE_ID'] = 9;
$data['ASSIGNED_BY_ID'] = 58;
$data['TITLE'] = 'Лид с квиза QUIZ.TINGARD.RU';
$data['NAME'] = $_POST['name'];
$data['PHONE'] = [['VALUE' => $_POST['phone'], 'VALUE_TYPE' => 'WORK']];
$data['COMMENTS'] = $_POST['answers'];
$data['TRACE'] = $_POST['trace'];
$data['UF_CRM_1517561552'] = array_key_exists('roistat_visit', $_COOKIE) ? $_COOKIE['roistat_visit'] : 'nocookie';

sendLeadEmail($data);
creationLead($data);
