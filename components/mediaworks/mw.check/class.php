<?php 
use Mw\Checklist\GooglesSheetCheck;
\Bitrix\Main\Loader::includeModule('iblock');
\Bitrix\Main\Loader::includeModule('mw.checklist');
\Bitrix\Main\Loader::IncludeModule("highloadblock");
use Mw\Checklist\Checkhelp;
use Mw\Checklist\GoogleSheet; 
/* 
* Comment Text 
*/
class mw_check extends CBitrixComponent 
{
  
  public function onPrepareComponentParams($arParams){
      $result = array(
      "CACHE_TYPE"    => $arParams["CACHE_TYPE"]
      );
      return $result;
  }

  private function getSectionID( $code ){
    \Bitrix\Main\Loader::includeModule('iblock');
    $rsSections = CIBlockSection::GetList(array(),array('IBLOCK_ID' => '59', '=NAME' => $code));
    $arSection = $rsSections->Fetch();
    return $arSection;
  }

  private function getElementName( $name, $section ){
    $sectionID = $this->getSectionID($section);
    \Bitrix\Main\Loader::includeModule('iblock');
    $result = \Bitrix\Iblock\Elements\ElementcheckcontentTable::getList([
        'select' => ['ID', 'NAME', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'MORE_PHOTE.FILE'],
        'filter' => ['=NAME' => $name, '=IBLOCK_SECTION_ID'=> [157, 161, 162, 163, 164, 165, 166, 167, 168, 146] ],
    ]); // ->fetchAll();
    $elements = $result->fetchAll();
    $arMorePhoto = [];
    $element = [];
    if( count($elements) > 0){
      foreach($elements as $item){
        $element = $item;
        $element['PREVIEW_PICTURE'] = CFile::GetPath($item['PREVIEW_PICTURE']);
        $arMorePhoto[] = CFile::GetPath($item["IBLOCK_ELEMENTS_ELEMENT_CHECKCONTENT_MORE_PHOTE_FILE_ID"]);
      }
    }
    $element['MORE_PHOTO'] = $arMorePhoto;    
    return $element;
  }


  private function getGroupUser(){
    $group = 'fitter';
    $arGroup = \Bitrix\Main\Engine\CurrentUser::get()->getUserGroups();
    if( in_array(20, $arGroup) ) $group = 'otk';
    return $group;
  }
  
  

  private function getColorClass( $arAnswers ){
    $count = 0;
    $checkCount = 0;
    foreach( $arAnswers as $item ){
      $count ++;
      $checkCount = $checkCount + $item['COUNTER'];
    }
    if($count == $checkCount && $count != 0 ) return 'checklist-steps__questions-item_completed';
    if($checkCount != 0 ) return 'checklist-question__pagination-item_not-completed';
  }

  private function getAnswersArID( $arAnswers ){
    $arAnswersID = [];  
    foreach($arAnswers as $item){
      $arAnswersID[] = $item['ID']; 
    }
    return $arAnswersID;
  }

  //////////////////// новое все от инфоблока //////////////

  private function getElement($ID){
    $arSelect = Array("*"); // выбираем все свойства элемента
    $arFilter = Array("IBLOCK_ID" => 59, "ID" => $ID); // фильтр по коду элемента
    $checkPoint = [];
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    if ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields(); // получаем основные поля элемента
        $arProps = $ob->GetProperties(); // получаем свойства элемента
    }
    $checkPoint = array_merge( $arFields, $arProps );
    return $checkPoint;
  }

  private function getAllElementsSection($sectionID) {
    $arElemensSort = [];
    $arFilter = array("IBLOCK_ID" => 59, "SECTION_ID" => $sectionID);
    $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, array( 'ID', 'NAME', 'CODE' ));
    $arFields = [];
    while( $ob = $res->Fetch() ){
        $arFields[] = $ob;
    }
    $arElemensSort = $arFields;
    return $arElemensSort;
  }

  private function getPoint( $SECTION_ID ){
      $res = CIBlockSection::GetByID($SECTION_ID);
      $ar_res = $res->Fetch();
      return $ar_res;
  }

  private function getCheckPoint( $CODE ){
      $arFilter = array("IBLOCK_ID" => 62, "CODE" => $CODE);
      $res = CIBlockElement::GetList(Array(), $arFilter, false, false, array( 'ID', 'NAME', 'CODE' ));
      $result = $res->Fetch();
      return $result;
  }



  private function getCardPosition($number){
    $arCards = GoogleSheet::getAllTable();
    $iter = 0;
    foreach($arCards as $item){
    $iter++;
      if( $item[6] == $number ){
        return $iter;
      }
    }
    var_dump($arCards);
  }

  function executeComponent(){
    GoogleSheet::$gid = 514707554;
    // получить связанный элемент по имени
    $request  = \Bitrix\Main\Context::getCurrent()->getRequest();
    $answerID = $request->get("CHECK_ID");
    $arID = explode('_', $answerID);
    $this->arResult['ORDER'] = $arID[1];
    $this->arResult['V_POS'] = $this->getCardPosition($arID[1]);
    $element = $this->getElement($arID[0]);
    $this->arResult['ELEMENT'] = $element;
    $allElements = $this->getAllElementsSection($element['IBLOCK_SECTION_ID']);
    $this->arResult['ALL_ELEMENTS'] = $allElements;
    $this->arResult['POINT'] = $this->getPoint($element['IBLOCK_SECTION_ID']);
    $pagination = [];
    $this->arResult['AR_PAGIN'] = Checkhelp::getItemsHL( $arID[1] ); 

    $flagForCheckAllquestion = true; // проверяем все ли ответы заполнены как "ДА"
    foreach($allElements as $item ){
      $pagination[] = $item['ID'].'_'.$arID[1];
					if($this->arResult['AR_PAGIN'][$item['ID']] != 'Y'){
            $flagForCheckAllquestion = false;
          }
    }
    if($flagForCheckAllquestion){
        GooglesSheetCheck::changeCellColor($this->arResult['POINT']['ID'],$this->arResult['V_POS'],"00b050");
    }

    $this->arResult['GROUP_USER_PROD'] = $this->getGroupUser();
    $this->arResult['CheckPoint'] = $this->getCheckPoint($arID[1]);
    $this->IncludeComponentTemplate();
    return $this->arResult;
  }
}
