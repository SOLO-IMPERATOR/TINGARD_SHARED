<?php

use Bitrix\Main\Page\Asset;
use Mw\Promocode\Utm;
use Mw\Promocode\GoogleSheet;
use Mw\Promocode\Counter; 
use \Bitrix\Main\Data\Cache;
use Bitrix\Main\Diag\Debug;

/* 
* Компонент выводит информацию о промо коде 
*/
class mw_promocode_component extends CBitrixComponent {
  
  public function onPrepareComponentParams($arParams){
      $result = array(
      "CACHE_TYPE"    => $arParams["CACHE_TYPE"],
      "URL_webhook"   => $arParams["URL_webhook"],
      "ID_DOC"        => $arParams["ID_DOC"],
      "TIME_COOKIES"  => $arParams["TIME_COOKIES"],
      "NAME_SHEET"    => $arParams["NAME_SHEET"],
      "ID_SHEET"      => $arParams["ID_SHEET"]
      );
      return $result;
  }

  private function getAllTableChahe(){

    $cache = Cache::createInstance();
 
    $cachePath = 'promocode'; // папка, в которой лежит кеш
    $cacheTtl = 3600; // срок годности кеша (в секундах)
    $cacheKey = 'promocode'; // имя кеша
    
    // if ($cache->initCache($cacheTtl, $cacheKey, $cachePath))
    // {
    //     $arTable = $cache->getVars();
    // }
    // elseif ($cache->startDataCache())
    // {
    //   GoogleSheet::$gid = $this->arParams["ID_SHEET"];
    //   $arTable = GoogleSheet::getAllTable();
    //     // $cacheInvalid = false;
    //     // if ($cacheInvalid)
    //     // {
    //     //     $cache->abortDataCache();
    //     // }        

    //     $cache->endDataCache($arTable);
    // }
    GoogleSheet::$gid = $this->arParams["ID_SHEET"];
    $arTable = GoogleSheet::getAllTable();
    return $arTable;
  }
  
  public function executeComponent(){
      if( !empty($this->arParams["URL_webhook"]) ) GoogleSheet::$webHookURL = $this->arParams["URL_webhook"];
      if( !empty($this->arParams["ID_DOC"]) ) GoogleSheet::$idDoc = $this->arParams["ID_DOC"];
      if( !empty($this->arParams["TIME_COOKIES"]) ) Utm::$timeLive = (int)$this->arParams["TIME_COOKIES"] * 3600;
      $utm = Utm::getUTM();
      $arPromocode = [];
      $isPromocode = false;
      if( !empty($utm['utm_campaign']) ){ 
        
        $allFields = $this->getAllTableChahe();

        foreach( $allFields as $key => $field ){

          if( strpos($field[5], $utm['utm_campaign'])){
            
            $arPromocode = $field;
            $resultSearchItem = Counter::getIDitem($utm['utm_campaign']);

            if( empty($resultSearchItem) ){
              Counter::addItem( $utm['utm_campaign'] );
              $hl = 1;
            }else{
              $hl = Counter::upCounter($utm['utm_campaign']);
            }

            $index = (int)$key+1;
            // пока так - координаты строки пишем в куки, что бы потом при создании лида взять 
            setcookie('utm_coordinate', $index, time() + 3600, '/');
            $arGetParams = [
              'sheetname' => $this->arParams['NAME_SHEET'],
              'transition' => $hl,
              'coordinate' => 'G'.$index,
              'id' => $this->arParams["ID_SHEET"]
            ];

            GoogleSheet::webHook( $arGetParams );
            $isPromocode = true;
          }

        }
      }

      $this->arResult['IS_PROMOCODE'] = $isPromocode;

      $this->arResult['RESULT_TABLE_ITEM'] = $arPromocode;

      $this->IncludeComponentTemplate();
      return $this->arResult;
  }
}
