<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
/**
 * Check новости при ее открытии.
 */

Loader::includeModule("highloadblock");
$idUser = \Bitrix\Main\Engine\CurrentUser::get()->getId();
$hlblock_id = 27; // ID вашей HL-таблицы
$hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();

$filter = array(
  'UF_ID_USER' => $idUser,
  'UF_ID_EL' => $arResult['ID']
);

$rsData = $entity_data_class::getList(array(
  "select" => array("*"),
  "filter" => $filter
));

if( $arData = $rsData->Fetch() ){
//  echo '<pre>'; print_r($arData); echo '</pre>';
//  $entity_data_class::update($arData['ID'], array('UF_FLAG' => 'Y'));

}else{
  // Создание новой записи
  $result = $entity_data_class::add(array(
    'UF_ID_USER'  => $idUser,
    'UF_ID_EL'    => $arResult['ID'],
    'UF_FLAG'     => 'Y'
  ));
}
