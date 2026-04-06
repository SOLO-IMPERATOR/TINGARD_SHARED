<?php
\Bitrix\Main\Loader::includeModule('iblock');
\Bitrix\Main\Loader::includeModule('mw.checklist');
use Mw\Checklist\GoogleSheet; 
use Mw\Checklist\Checkhelp;
use \Bitrix\Main\UserTable;
use Bitrix\Highloadblock as HL,
    Bitrix\Main\Entity;

/* 
* Comment Text 
*/
class mw_checkprod extends CBitrixComponent {
  
  public function onPrepareComponentParams($arParams){
    $result = array(
      "CACHE_TYPE"    => $arParams["CACHE_TYPE"],
      "URL_webhook"   => $arParams["URL_webhook"],
      "ID_DOC"        => $arParams["ID_DOC"],
      "GID"           => $arParams["GID"],
      "TIME_COOKIES"  => $arParams["TIME_COOKIES"]
      );
      return $result;
  }
  
  /**
   * getAllCards - получаем все карточки из таблицы
   *
   * @return void
   */
  private function getAllCards(){
    $arCards = GoogleSheet::getAllTable();
    unset($arCards[0], $arCards[1], $arCards[2]);
    $arResultCard = [];
   
    foreach($arCards as $item){
      if( $item[7] === 'TRUE'){
        $arResultCard[] = $item;
      }
    }
    return $arResultCard;
  }
  
  /**
   * getCard - отдельная карточка по номеру заказа
   *
   * @param  mixed $order
   * @return void
   */
  private function getCard($number){
    $arCards = GoogleSheet::getAllTable();
    unset($arCards[0], $arCards[1], $arCards[2]);
    $arCard = [];
 
    foreach($arCards as $item ){
   
      if( $item[6] == $number ){
      
        $arCard = $item; 
        return $arCard;
      } 
    }
    
  }
  
  /**
   * getVoteFromOrder - получить опрос по номеру заказа 
   * 
   * переделываем это будет получить элемент инфоблока который связан с определенным элементом
   *
   * @param  mixed $number
   * @return void
   */
  private function getVoteFromOrder( $number ){
    $connection = \Bitrix\Main\Application::getConnection();
    $result = $connection->query('SELECT * FROM b_vote WHERE URL="'.$number.'"');
    $ar = $result->fetch();
    return $ar;
  }
  
  /**
   * getQuestions - получить подэтапы
   *
   * @param  mixed $vote_id
   * @return void
   */
  private function getQuestions( $vote_id ){
    $connection = \Bitrix\Main\Application::getConnection();
    $result = $connection->query('SELECT * FROM b_vote_question WHERE VOTE_ID ="'.$vote_id.'" ORDER BY C_SORT');
    $arID = [];
    while($ar = $result->fetch())
    { 
      $arID[] = $ar['FIELD_TYPE'];
    }
    return $arID;
  }
  
  /**
   * getUserData данные пользователя
   *
   * @param  mixed $ID
   * @return void
   */
  private function getUserData( $ID ){
    $dbUser = \Bitrix\Main\UserTable::getList(array(
        'select' => [ 'ID', 'NAME', 'LAST_NAME' ],
        'filter' => [
            'ID' => $ID
        ]
    ));
    $arUser = $dbUser->fetch();
    // echo '<pre>'; print_r($ID); echo '</pre>';
    return $arUser;
  }
  
  /**
   * getCurrentUser текущий пользователь
   *
   * @param  mixed $voteID
   * @return void
   */
  private function getCurrentUser( $voteID ){
    $arQuestion = $this->getQuestions( $voteID );
    $currUserID = 0;
    foreach($arQuestion as $item){
      if( $item != 0 ) $currUserID = $item;
    }
    $currUserID = $this->getUserData( $currUserID );
    return $currUserID;
  }
  
  /**
   * getParentSection - получить корневой раздел по коду, который соответствует коду модели. Это шаблонизатор.
   *
   * @param  mixed $code
   * @return void
   */
  public function getParentSection($allCards){
    $arSection = [];
    foreach($allCards as $item){
      $section = \Bitrix\Iblock\SectionTable::getList(array(
        "select" => array("*"),
        "filter" => array("=CODE" => $item[4]),
      ))->fetch();
      $arSection[$item[6]] = $section;
    }    
    return $arSection;
  }
  
  /**
   * getSections - получим внутренние азделы которые обозначают этапы. Шаблонизатор.
   *
   * @param  mixed $idParent
   * @return void
   */
  private function getSections($arParent){
    foreach($arParent as &$item){
      $sections = CIBlockSection::GetList(
          Array("SORT" => "ASC"),
          Array("IBLOCK_ID" => 59, "SECTION_ID" => $item['ID'], "ACTIVE" => "Y"),
          false,
          Array('ID', 'NAME', 'CODE')
      );
      while($ar_fields = $sections->GetNext()) {
        $item['SECTIONS'][] = $ar_fields;
      }
    }
    return $arParent;
  }
  
  /**
   * getElements
   *
   * @return void
   */
  private function getElements( $arIDSection ){
    $arElemensSort = [];
    foreach( $arIDSection as $section ){

      $arFilter = array(
          "IBLOCK_ID" => 59,
          "SECTION_ID" => $section['ID']
      );
      $res = CIBlockElement::GetList(Array('SORT'=>'ASC'), $arFilter, false, false, array( 'ID', 'NAME', 'CODE' ));
      $arFields = [];
      while( $ob = $res->Fetch() ){
          $arFields[] = $ob;
          // обработка полученных элементов
      }
//        if($_GET['debug'] == 'Y'){
//            echo  '<pre>'; print_r($arFields); echo '</pre>';
//        }
      $arElemensSort[$section['ID']] = $arFields;
    }
    return $arElemensSort;
  }
  
  private function getCheckPoint( $idOrder ){
    $arSelect = Array("*"); // выбираем все свойства элемента
    $arFilter = Array("IBLOCK_ID" => 62, "CODE" => $idOrder); // фильтр по коду элемента
    $checkPoint = [];
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    if ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields(); // получаем основные поля элемента
        $arProps = $ob->GetProperties(); // получаем свойства элемента
    }
    $checkPoint = ['FILDS'=>$arFields, 'PROP'=>$arProps ];
    return $checkPoint;
  }

    /**
     *  собираем всеотмеченые позиции чтобы показывать какие этапы выполнены, какие еще в работе.
     * @param $arIDPoints
     * @return array
     */
    private function getCheckPoints( $arIDPoints = [] ){
        $hlblock = HL\HighloadBlockTable::getById(19)->fetch();

        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        $rsData = $entity_data_class::getList(array(
            "select" => array("ID", "UF_ID_CHECK", "UF_ORDER", "UF_ID_POINT"),
            "order" => array("ID" => "DESC"),
            "filter" => array("UF_RESULT"=>"Y") //Фильтрация выборки
        ));
        $arResultPoints = [];
        while($arData = $rsData->Fetch()){
            $arResultPoints[$arData['UF_ORDER']][$arData['UF_ID_POINT']][] = $arData;
        }
        // выборка количества элементов из шаблонизатора
        $arTemplateElements = [];
        foreach ($arResultPoints as $id=>$item){
            foreach ( $item as $key=>$value){
                $section[]['ID'] = $key;
            }
            $elementsSection[$id] = $this->getElements($section);
        }
        $arReturnResultPoints['CHECK'] = $arResultPoints;
        $arReturnResultPoints['TEMPL'] = $elementsSection;
        return $arReturnResultPoints;
    }

  function executeComponent(){
    if( !empty($this->arParams["URL_webhook"]) )GoogleSheet::$webHookURL = $this->arParams["URL_webhook"];
    if( !empty($this->arParams["ID_DOC"]) )     GoogleSheet::$idDoc = $this->arParams["ID_DOC"];
    if( !empty($this->arParams["GID"]) )        GoogleSheet::$gid = $this->arParams["GID"];
    
    $allCards = $this->getAllCards();

    if( $_GET['ELEMENT_ID'] ){

      $number      = $_GET['ELEMENT_ID'];
      $info        = $this->getCard($number);
      $this->arResult['INFO'] = $info;
//      $idQuestions = $this->getVoteFromOrder( $number );
//      $this->arResult['QUESTIONS'] = $idQuestions;
//      $currentUser = $this->getCurrentUser( $idQuestions['ID'] );
//      $this->arResult['CURRENT_USER'] = $currentUser;
      
      // получим все подразделы из шаблонизатора
      $arParentSection  = $this->getParentSection($allCards);
      $arAllSections    = $this->getSections($arParentSection);
      $this->arResult['SECTION_PARENT'] = $arAllSections[$number];
      $elements = $this->getElements($arAllSections[$number]['SECTIONS']);  
      $this->arResult['AR_ELEMENTS'] = $elements; 

      // получим элемент чэклиста / в котором состояние этапов
      $this->arResult['CHECK_POINT'] = $this->getCheckPoint($number); 
      $this->arResult['AR_PAGIN'] = Checkhelp::getItemsHL( $number );

      // $classFill = Checkhelp::getCheckColor($this->arResult["QUESTIONS"]);
      // $this->arResult['CHECK_FILL'] = $classFill;

      $this->IncludeComponentTemplate('step2');
    }else{
        $arParentSection  = $this->getParentSection($allCards);
        $arAllSections    = $this->getSections($arParentSection);
        $this->arResult['SECTION_PARENT'] = $arAllSections;
      
      $this->arResult['CARDS'] = $allCards;
      $arID = [];
      foreach($allCards as $item){
          $arID[] = $item[6];
      }
      // получим все чекнутые этапы по картам
      $this->arResult['CHECK_POINT_FILL'] = $this->getCheckPoints($arID);
      // получим все подразделы из шаблонизатора
      $arParentSection = $this->getParentSection($allCards);
      $arAllSections = $this->getSections($arParentSection);
      $this->arResult['SECTION_PARENT'] = $arAllSections;

      $this->IncludeComponentTemplate();
    }    
    return $this->arResult;
  }
}
