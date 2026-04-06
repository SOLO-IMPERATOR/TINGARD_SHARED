<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
/**
 * данные текущего пользователя
 */

$arFilter = array(
  "ACTIVE" => "Y",
  'ID' => \Bitrix\Main\Engine\CurrentUser::get()->getId()
  // Дополнительные фильтры, если необходимо
);

$arParameters = array(
  "SELECT" => array("*", "UF_ID_COMPANY", "UF_DEALER_ID"), // Укажите код множественного поля
);

$rsUsers = CUser::GetList("ID", "desc", $arFilter, $arParameters);
$arDealer = $rsUsers->Fetch();
$ASSIGNED_BY_ID =  $arDealer["UF_ID_COMPANY"];
Bitrix\Main\Diag\Debug::writeToFile($arDealer["UF_DEALER_ID"], 'Диллер '.date('d.m.Y'), '/upload/log_deliveryRequest.txt');

// определение
if( !empty($arDealer["UF_DEALER_ID"]) ) {
  $arFilter = array(
    "ACTIVE" => "Y",
    'ID' => $arDealer["UF_DEALER_ID"]
    // Дополнительные фильтры, если необходимо
  );
  $arParameters = array(
    "SELECT" => array("*", "UF_ID_COMPANY", "UF_DEALER_ID"), // Укажите код множественного поля
  );
  $rsUsers = CUser::GetList("ID", "desc", $arFilter, $arParameters);
  $arDealer = $rsUsers->Fetch();
  $ASSIGNED_BY_ID =  $arDealer["UF_ID_COMPANY"];
}
Bitrix\Main\Diag\Debug::writeToFile($arDealer, 'Диллер '.date('d.m.Y'), '/upload/log_deliveryRequest.txt');


// определение ответственного компании
$addFields = [ 'id' =>  $ASSIGNED_BY_ID ];
$requestResult = callM($addFields, 'crm.company.get');
$ASSIGNED_BY_ID = $requestResult['result']['ASSIGNED_BY_ID']; // ?? ASSIGNED_BY_ID;
Bitrix\Main\Diag\Debug::writeToFile($requestResult, 'ответственный '.date('d.m.Y'), '/upload/log_deliveryRequest.txt');

/**
 *  Отправка заявки в Б24 на расчет доставки
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');
function callM($array, $name){
  $result = CRest::call(
    $name, $array
  );
  return $result;
}

$arData = $_REQUEST;

$arFields = [
  'EMAIL' =>  'EMAIL_MANAGER',
  'ADDRESS_FROM' => $arData['address-from'],
  'ADDRESS_TO' => $arData['address-to'],
  'TRANSPORT' => $arData['transport'],
  'DATA' => $arData['time']
];

// отправить письмо
//$result = CEvent::Send('LK_DELIVERY_CALC', 's3', $arFields );
CEvent::sendImmediate('LK_DELIVERY_CALC', 's3', $arFields );


$comment = '<b>Адрес отгрузки: </b>' .$arData['address-from']. ' <br/>';
$comment .= '<b>Куда доставить: </b>' .$arData['address-to']. ' <br/>';
$comment .= '<b>Вид транспорта: </b>' .$arData['transport']. ' <br/>';
$comment .= '<b>Сроки доставки: </b>' .$arData['time']. ' <br/>';

$addFields = [
  "fields" => [
      "TITLE"           => 'Заявка на расчет доставки из LK тестирование',
      "NAME"            => $arDealer['NAME'],
      "LAST_NAME"       => $arDealer['LAST_NAME'],
      "ASSIGNED_BY_ID"  => $ASSIGNED_BY_ID,
      "CREATED_BY_ID"   => 11, //$ASSIGNED_BY_ID,
    "MODIFY_BY_ID" => 11,
      "COMPANY_ID"      => $arDealer['UF_ID_COMPANY'],
      "COMMENTS"        => $comment,
      "UF_CRM_5697ACD8410AA" => 536,
      "UF_CRM_1449663065"   => 66,
      "UF_CRM_PHONE_WORK" => $arDealer['WORK_PHONE'],
      "UF_CRM_EMAIL_WORK" => $arDealer['EMAIL'],
      'PHONE' => [
        'n0' => [
          'VALUE' => $arDealer['WORK_PHONE'],
          'TYPE' => 'WORK'
        ]
      ],
      'EMAIL' => [
        'n0' => [
          'VALUE' => $arDealer['EMAIL'],
          'TYPE' => 'WORK'
        ]
      ]
    ]
];

$requestResult = callM($addFields, 'crm.deal.add');
Bitrix\Main\Diag\Debug::writeToFile($addFields, 'rest поля запрос стоимости доставки: '.date('d.m.Y'), '/upload/log_deliveryRequest.txt');
Bitrix\Main\Diag\Debug::writeToFile($requestResult, 'rest результат: '.date('d.m.Y'), '/upload/log_deliveryRequest.txt');
echo json_encode($requestResult);
