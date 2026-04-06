<?php 
/* 
* Comment Text 
*/
\Bitrix\Main\Loader::IncludeModule("mw.lk");
use mw\lk\yadisk;

class files_ya extends CBitrixComponent {
  public function onPrepareComponentParams($arParams){
      $result = array(
        "CACHE_TYPE"    => $arParams["CACHE_TYPE"],
        "URL_YA"        => $arParams["URL_YA"],
        "PARENT_PATH"   => $arParams["PARENT_PATH"],
        "ROOT_PATH"     => $arParams["ROOT_PATH"],
        "TITLE"         => $arParams["TITLE"],
        "AJAX"         => $arParams["AJAX"],
        );
      return $result;
  }

  private function getListCurrDir( $url ){
    $ya = new yadisk();
    $result = $ya->getListDir($url);
//    echo '<pre>'; print_r($result['_embedded']['items']); echo '</pre>';
    return $result['_embedded']['items'];
  }


    public function disk_resources_upload(string $filePath, string $dirPath = '')
    {
      /* отправляем запрос на получение ссылки для загрузки */
      $arrParams = [
        'path' => $dirPath . basename($filePath),
        'overwrite' => 'true',
      ];
      $urlQuery = 'https://cloud-api.yandex.net/v1/disk/resources/upload';
      $resultQuery = $this->sendQueryYaDisk($urlQuery, $arrParams);
    /* ----------------- */

    if (empty($resultQuery['error'])) {
      /* Если ошибки нет, то отправляем файл на полученный URL. */
      $fp = fopen($filePath, 'r');

      $ch = curl_init($resultQuery['href']);
      curl_setopt($ch, CURLOPT_PUT, true);
      curl_setopt($ch, CURLOPT_UPLOAD, true);
      curl_setopt($ch, CURLOPT_INFILESIZE, filesize($filePath));
      curl_setopt($ch, CURLOPT_INFILE, $fp);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_HEADER, false);
      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

      return $http_code;
    } else {
      return $resultQuery['message'];
    }

  }

  function executeComponent(){

      $listDir = $this->getListCurrDir('/v1/disk/resources?path='.$this->arParams["URL_YA"]);

//    print_f($this->arParams);
      if( !empty($this->arParams['PARENT_PATH']) && $this->arParams['URL_YA'] != $this->arParams['ROOT_PATH']) {
        $rootDir = ['type'=>'dir', 'name'=>'...', 'path' => $this->arParams['PARENT_PATH'] ];
        array_unshift($listDir, $rootDir);
      }
      $this->arResult['homeDir'] = $listDir;
      $this->IncludeComponentTemplate();
      return $this->arResult;
  }
}
