<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
session_start();

\Bitrix\Main\Loader::includeModule('mw.promocode');
use Mw\Promocode\Utm;
use Mw\Promocode\GoogleSheet;
use Mw\Promocode\Counter;

require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

/**
 * Поиск дубликатов
 * @param String $data
 */
function findDuplicate($data)
{
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

/**
 * Создание контакта
 * @param Array $data
 */
function creationContact($data)
{
	$dubl = findDuplicate($data);
	$contact = false;

	if (empty($dubl["result"]["CONTACT"])) {
		$result = CRest::call(
			"crm.contact.add",
			[
				"fields" => [
					'UF_CRM_566E8F1A1E899' => 170, //направление продаж (контакты)
					"PHONE" =>  [["VALUE" => $data["PHONE_WORK"], "VALUE_TYPE" => "WORK"]], //телефон
					"EMAIL" =>  [["VALUE" => $data["EMAIL_WORK"], "VALUE_TYPE" => "WORK"]], //почта
					'NAME' => $data["NAME"], //имя контакта
				]
			]
		);

		$contact = $result['result'];
	} else {
		if (count($dubl["result"]["CONTACT"]) > 1) {
			$contact = $dubl["result"]["CONTACT"][0];
		} else {
			$contact = $dubl["result"]["CONTACT"];
		}
	}

	return  $contact;
}

/**
 * Создание лида
 * @param Array $data
 */
function creationLead($data)
{
	$fields = [
		'SOURCE_ID' => 'CONFERENCE',
		'ASSIGNED_BY_ID' => 58,
		'TITLE' => $data['title'],
	];

	if ($data['name']) {
		$fields['NAME'] = $data['name'];
	} else {
		$fields['NAME'] = '';
	}

	if ($data['phone']) {
		$fields['PHONE'] = [['VALUE' => $data['phone'], 'VALUE_TYPE' => 'WORK']];
	}

	if ($data['email']) {
		$fields['EMAIL'] = [['VALUE' => $data['email'], 'VALUE_TYPE' => 'WORK']];
	}

	if ($data['comments']) {
		$fields['COMMENTS'] = $data['comments'];
	}

	if ($data['salesDirection']) {
		$fields['UF_CRM_1449663065'] = $data['salesDirection'];
	} else {
		$fields['UF_CRM_1449663065'] = 14016;
	}

	if ($data['type']) {
		$fields['COMMENTS'] = 'Тип сотрудничества: ' . $data['type'];
	}

	// var_dump($fields);

	$resultLead = CRest::call(
		'crm.lead.add',
		[
			'fields' => $fields
		]
	);

	if (!empty($resultLead['result'])) {
		echo json_encode(['message' => 'Lead add']);

		// добавление в гугл таблицу 
		$arUtm = Utm::getUTMcookies();
		if( !empty($arUtm['utm_campaign']) ) {
			$countLead = Counter::upLeadCounter($arUtm['utm_campaign']);      
			$arGetParams = [
					'transition' => $countLead,
					'coordinate' => 'H' . $_COOKIE['utm_coordinate']
				];  
			GoogleSheet::webHook( $arGetParams );
		}

		return $resultLead['result'];
	} elseif (!empty($resultLead['error_description'])) {
		echo json_encode(['message' => 'Lead not added: ' . $resultLead['error_description']]);
	} else {
		echo json_encode(['message' => 'Lead not added']);
	}
}
