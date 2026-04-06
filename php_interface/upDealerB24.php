<?php
/**
 * Обновление данных Дилера и связанных менеджеров из Б24
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/ajax/crest.php');

AddEventHandler("main", "OnAfterUserLogin", Array("upCompany", "OnAfterUserLoginHandler"));
class upCompany
{
  // создаем обработчик события "OnAfterUserLogin"
  public static function OnAfterUserLoginHandler(&$fields)
  {
    Bitrix\Main\Diag\Debug::writeToFile($fields, '$fields', '/upload/log_auth.txt');
    $user = \Bitrix\Main\UserTable::getList(array(
      'filter' => array(
        '=ID' => $fields['USER_ID'],
      ),
      'select'=>array('*','UF_*'),
    ))->fetch();

    if( !empty($user['UF_ID_COMPANY']) && empty($user['UF_DEALER_ID']) ){
       // обновление названии компании у дилера
      $contactB24 = self::getContact($user['UF_ID_COMPANY']);
      Bitrix\Main\Diag\Debug::writeToFile($user, 'Dealer', '/upload/log_auth.txt');
      Bitrix\Main\Diag\Debug::writeToFile($contactB24, 'Б24', '/upload/log_auth.txt');
      if( !empty($contactB24['result']['ID']) ){
        $user = new CUser;
        $fieldsUP = Array(
          "WORK_COMPANY" => $contactB24['result']['TITLE']
        );
        $iduserResult = $user->Update($fields['USER_ID'], $fieldsUP);
        Bitrix\Main\Diag\Debug::writeToFile($iduserResult, 'up', '/upload/log_auth.txt');
      }
    }else {
      // обновление компании у мененджера
      $dealer = \Bitrix\Main\UserTable::getList(array(
        'filter' => array(
          '=ID' => $user['UF_DEALER_ID'],
        ),
        'select'=>array('*','UF_*'),
      ))->fetch();
      $contactB24 = self::getContact($dealer['UF_ID_COMPANY']);
      $user = new CUser;
      $fieldsUP = Array(
        "WORK_COMPANY" => $contactB24['result']['TITLE']
      );
      $iduserResult = $user->Update($fields['USER_ID'], $fieldsUP);
      Bitrix\Main\Diag\Debug::writeToFile($iduserResult, 'up менеджера', '/upload/log_auth.txt');
    }
  }

  private static function getContact($id){
    $result = CRest::call(
      'crm.company.get', ['id' => $id]
    );
    return $result;
  }

}