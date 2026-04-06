<?php

class DownloadFiles {
  private $arTempNameFiles = [];
  private $moveDir = '';
  private $arURLFiles = [];
  /**
   * @param $files - массив файлов
   */
  public function __construct( $files )
  {
    $this->arTempNameFiles = $files;
    $this->moveDir = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
    $this->moveFiles($files);
  }

  /**
   * формирует массив ссылок на перемещенные файлы
   */
  private function moveFiles( $files ){
    $i = 0;
    foreach ($files['tmp_name'] as $file){
      $moveDir = $this->moveDir . $files['name'][$i];
      if( move_uploaded_file( $file, $moveDir ) ){
        $this->arURLFiles[] = [
          'name' => $files['name'][$i],
          'url'  => $moveDir
        ];
      }
      $i++;
    }
  }

  public function getURLsFiles(){
    if( empty($this->arURLFiles) ){
      return false;
    }else {
      return $this->arURLFiles;
    }
  }
  public function getfileContent($URLFile){
    $content = base64_encode(file_get_contents($URLFile));
    return $content;
  }
  public function deleteFiles()
  {
    foreach ($this->arURLFiles as $file){
      unlink($file);
    }
  }

}