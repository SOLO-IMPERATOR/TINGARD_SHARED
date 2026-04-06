<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

/**
 *  Отправка заявки в Б24
 */
function callM($array, $name){
  $result = CRest::call(
    $name, $array
  );
  return $result;
}

$position = [];
$positionVal = [];
$additional = [];
$additionalVal = [];

foreach ($_REQUEST as $key=>$value){
  $se = stripos($key, 'pos');
  echo ' | p' .$se. ' key: '. $key;
  if( stripos($key, 'position') === 0 ){
    $position[] = $value;
  }
  if( stripos($key, 'valueprod') === 0 ){
    $positionVal[] = $value;
  }
  if( stripos($key, 'additionalposition') === 0 ){
    $addposition[] = $value;
  }
  if( stripos($key, 'valuedop') === 0 ){
    $addpositionVal[] = $value;
  }
}

$arProduct = [
  'product'   => $position,
  'quantity'  => $positionVal
];
$arDopProduct = [
  'adproduct' => $addposition,
  'quantity'  => $addpositionVal
];

$comment = '<b>Выбранные товарные позиции:</b><br/>';
if( !empty($arProduct['product']) ) {
  foreach ($arProduct['product'] as $key => $item) {
    $comment .= $key + 1 . '. ' . $item . '(' . $arProduct['quantity'][$key] . ' шт.) <br/>';
  }
}
$comment .= '<br/><b>Доп. комплектация:</b> <br/>';
if( !empty($arDopProduct['adproduct'])) {
  foreach ($arDopProduct['adproduct'] as $key => $item) {
    $comment .= $key + 1 . '. ' . $item . '(' . $arProduct['quantity'][$key] . ' шт.) <br/>';
  }
}

$comment .= '<br/><b>Склад отгрузки: </b>' . $_REQUEST['stock'] . ' <br/>';
$comment .= '<b>Способ оплаты:</b> ' . $_REQUEST['payment'] . ' <br/><br/>';
$comment .= '<b>Комментарий:</b> <br/>';
$comment .=  $_REQUEST['comment'];

// определение контакта или копании
$arFilter = array(
  'ID' => \Bitrix\Main\Engine\CurrentUser::get()->getId()
);
$arParameters = array(
  "SELECT" => array("ID", "UF_ID_COMPANY", "UF_DEALER_ID"), // Укажите код множественного поля
);
$arDealer = CUser::GetList("ID", "desc", $arFilter, $arParameters)->Fetch();

$ASSIGNED_BY_ID =  $arDealer["UF_ID_COMPANY"];
Bitrix\Main\Diag\Debug::writeToFile($arDealer["UF_DEALER_ID"], 'Диллер '.date('d.m.Y'), '/upload/log_Request.txt');

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
Bitrix\Main\Diag\Debug::writeToFile($arDealer, 'Диллер '.date('d.m.Y'), '/upload/log_Request.txt');

// определение ответственного компании
$addFields = [ 'id' =>  $ASSIGNED_BY_ID ];
$requestResult = callM($addFields, 'crm.company.get');
$ASSIGNED_BY_ID = $requestResult['result']['ASSIGNED_BY_ID']; // ?? ASSIGNED_BY_ID;
Bitrix\Main\Diag\Debug::writeToFile($requestResult, 'ответственный '.date('d.m.Y'), '/upload/log_Request.txt');


$companyID = $arDealer["UF_ID_COMPANY"];
$contactID = $ASSIGNED_BY_ID ;
/*if( !empty($arDealer["UF_DEALER_ID"]) ){
  $contactID = $ASSIGNED_BY_ID;
} else {
  $companyID = $arDealer["UF_ID_COMPANY"];
}*/


// проверяем компания или контакт

$addFields = [
  "fields" => [
      "TITLE" => "Заявка из LK tingerplast.ru",
      "ASSIGNED_BY_ID" => $ASSIGNED_BY_ID,
      'COMMENTS' => $comment,
      'UF_CRM_1559301643671' => $_REQUEST['delivery'],
      'UF_CRM_5697ACD8410AA' => 536,
      'UF_CRM_1449663065' => 66,
      'COMPANY_ID' => $companyID,
      'CONTACT_ID' => $contactID 
    ]
];

$requestResult = callM($addFields, 'crm.deal.add');
Bitrix\Main\Diag\Debug::writeToFile($addFields, 'rest поля запрос стоимости доставки: '.date('d.m.Y'), '/upload/log_Request.txt');
Bitrix\Main\Diag\Debug::writeToFile($requestResult, 'rest результат: '.date('d.m.Y'), '/upload/log_Request.txt');
echo json_encode($requestResult);

