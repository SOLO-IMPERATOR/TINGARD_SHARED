<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

Loader::includeModule("highloadblock");
$idUser = \Bitrix\Main\Engine\CurrentUser::get()->getId();
$hlblock_id = 27; // ID вашей HL-таблицы
$hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();

$filter = array(
  'UF_ID_USER' => $idUser
);
$rsData = $entity_data_class::getList(array(
  "select" => array("*"),
  "filter" => $filter
));
$arElements = [];
while($arData = $rsData->Fetch()){
  $arElements[$arData['UF_ID_EL']] = $arData;
}
$arResult['checkElements'] = $arElements;
