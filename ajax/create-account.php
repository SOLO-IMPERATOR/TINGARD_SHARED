<?php


define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

function callM($array, $name){
  $result = CRest::call(
    $name, $array
  );
  return $result;
}

$arFilter = array(
  "ACTIVE" => "Y",
  'ID' => \Bitrix\Main\Engine\CurrentUser::get()->getId()
  // Дополнительные фильтры, если необходимо
);
$arParameters = array(
  "SELECT" => array("UF_USERS_DEALER", "WORK_COMPANY", "UF_ID_COMPANY"), // Укажите код множественного поля
);
$rsUsers = CUser::GetList("ID", "desc", $arFilter, $arParameters);
$arDealer = $rsUsers->Fetch();


// создаем аккаунт и получаем id
$user = new CUser;
$arFields = [
    "NAME"              => $_REQUEST['full-name'],
    "WORK_POSITION"     => $_REQUEST['post'],
    "EMAIL"             => $_REQUEST['email'],
    "LOGIN"             => $_REQUEST['email'],
    "LID"               => "ru",
    "ACTIVE"            => "Y",
    "GROUP_ID"          => array(21),
    "WORK_PHONE"        => $_REQUEST['tel'],
    "PASSWORD"          => $_REQUEST['password'],
    "WORK_PAGER"        => $_REQUEST['tel-add'],
    "CONFIRM_PASSWORD"  => $_REQUEST['password'],
    "WORK_COMPANY"      => $arDealer['WORK_COMPANY'],
    "UF_ID_COMPANY"     => $arDealer['UF_ID_COMPANY'],
    "UF_DEALER_ID"      => $arDealer['ID'],
    //"PERSONAL_PHOTO"    => $arIMAGE
];
$ID = $user->Add($arFields);


if (intval($ID) > 0) {
  // отправляем письмо сотруднику
  $arFields = [
    'EMAIL' => $_REQUEST['email'],
    'LOGIN' => $_REQUEST['email'],
    'PASSWORD' => $_REQUEST['password']
  ];

  $result = CEvent::SendImmediate('NEW_USER_CONFIRM', 's3', $arFields, 'Y', 66 );
  //$result = CEvent::Send('NEW_USER_CONFIRM', 's3', $arFields, 'Y', 66 );

  // отправляем письмо Дилеру
 
  $arFields = [
    'EMAIL' => $arDealer['EMAIL'],
    'LOGIN' => $_REQUEST['email'],
    'PASSWORD' => $_REQUEST['password']
  ];
  $result = CEvent::SendImmediate('NEW_USER_CONFIRM', 's3', $arFields, 'Y', 66 );
  //$result = CEvent::Send('NEW_USER_CONFIRM', 's3', $arFields, 'Y', 66 );
  $arIDusers = $arDealer['UF_USERS_DEALER'];
  array_push($arIDusers, $ID);

  $userID = \Bitrix\Main\Engine\CurrentUser::get()->getId();
  $arFields = array(
    "UF_USERS_DEALER" => $arIDusers,
  );
  $user = new CUser;
  $user->Update($userID, $arFields);
  $arSuccessReg = ['result'=>'ok'];

  $addFields = [ 'id' =>  $arDealer['UF_ID_COMPANY'] ];
  $requestResult = callM($addFields, 'crm.company.get');
  $ASSIGNED_BY_ID = $requestResult['result']['ASSIGNED_BY_ID'];

  // создаем контакт к компании
  $addFields = [
    "fields" => [
      "NAME"            => $_REQUEST['full-name'],
			"OPENED"          => "Y",
			"ASSIGNED_BY_ID"  => $ASSIGNED_BY_ID,
			"TYPE_ID"         => "CLIENT",
      "COMPANY_ID"      => $arDealer['UF_ID_COMPANY'],
      "POST"            => $_REQUEST['post'],
      "UF_CRM_566E8F1A1E899" => 172,
      'PHONE' => [
        'n0' => [
          'VALUE' => $_REQUEST['tel'],
          'TYPE' => 'WORK'
        ]
      ],
      'EMAIL' => [
        'n0' => [
          'VALUE' => $_REQUEST['email'],
          'TYPE' => 'WORK'
        ]
      ]
    ]
  ];
  $requestResult = callM($addFields, 'crm.contact.add');

  Bitrix\Main\Diag\Debug::writeToFile($addFields, 'rest поля запрос стоимости доставки: '.date('d.m.Y'), '/upload/log_createUser.txt');
  Bitrix\Main\Diag\Debug::writeToFile($requestResult, 'rest результат: '.date('d.m.Y'), '/upload/log_createUser.txt');

  if( $requestResult['result'] ){
    $arFields['UF_ID_COMPANY'] = $requestResult['result'];
    $user->Update($ID, $arFields);
  }
  echo json_encode($arSuccessReg);

}else {
  $substring = strstr($user->LAST_ERROR, '<br>', true);
  $arSuccessReg = [ 'result' => 'err', 'error' => $substring ];
  echo json_encode($arSuccessReg);
//// обновляем поле UF_USERS_DEALER
}