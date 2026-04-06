<?php
/* 
* Comment Text 
*/
//\Bitrix\Main\Loader::IncludeModule("mw.lk");
use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

class navigation_block extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
      "CACHE_TYPE"    => $arParams["CACHE_TYPE"],
        "IBLOCK_ID"   => $arParams["IBLOCK_ID"],
      );
      return $result;
  }

  private function getCountNews(){
    if (CModule::IncludeModule("iblock")) {
      $filter = array(
        "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
        "ACTIVE" => "Y"
      );
      $result = CIBlockElement::GetList(array(), $filter, array());
      return $result;
    }
  }

  private function getCountReadNews()
  {
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
    return count($arElements);
  }

  private function getCountMess()
  {
    Loader::includeModule("highloadblock");
    $idUser = \Bitrix\Main\Engine\CurrentUser::get()->getId();
    $hlblock_id = 28; // ID вашей HL-таблицы
    $hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();

    $filter = array(
      'UF_ID_CHAT' => 'chat'.$idUser
    );
    $rsData = $entity_data_class::getList(array(
      "select" => array("*"),
      "filter" => $filter
    ));
    $countMess = $rsData->Fetch();
    return $countMess['UF_COUNT'];
  }

  function executeComponent(){
      $this->arResult['MessCount'] = $this->getCountMess() ?? 0;
      $unReadNews = (int)$this->getCountNews() - (int)$this->getCountReadNews();
      $this->arResult['NewsCount'] = $unReadNews;
      $this->IncludeComponentTemplate();
      return $this->arResult;
  }
}
