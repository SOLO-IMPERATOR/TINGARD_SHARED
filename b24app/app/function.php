<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
include_once('/var/www/bitrix/data/www/shared/local/b24app/app/crest.php');

function getConnectorID()
{
	return 'example_connector_1';
	// return 'livechat';
}
function getChat($chatID)
{
	$result = [];
	if (file_exists('/var/www/bitrix/data/www/shared/local/b24app/app/chats/' . $chatID . '.txt'))
	{
		$result = json_decode(file_get_contents('/var/www/bitrix/data/www/shared/local/b24app/app/chats/' . $chatID . '.txt'), 1);
	}
	return $result;
}
function saveMessage($chatID, $arMessage)
{
	$arMessages = getChat($chatID);
	$count = count($arMessages);
  $arMessage['dateDay'] = date('d.m.Y');
	$arMessages['message' . $count] = $arMessage;
	if (file_put_contents(__DIR__ . '/chats/' . $chatID . '.txt', json_encode($arMessages)))
	{
		$return = $count;
	}
	else
	{
		$return = false;
	}
	return $return;
}
function getLine()
{
	return 96; //file_get_contents(__DIR__ . '/line_id.txt');
}
function setLine($line_id)
{
	return file_put_contents(__DIR__ . '/line_id.txt', intVal($line_id));
}
function convertBB($var)
{
	$search = array(
		'/\[b\](.*?)\[\/b\]/is',
		'/\[br\]/is',
		'/\[i\](.*?)\[\/i\]/is',
		'/\[u\](.*?)\[\/u\]/is',
		'/\[img\](.*?)\[\/img\]/is',
		'/\[url\](.*?)\[\/url\]/is',
		'/\[url\=(.*?)\](.*?)\[\/url\]/is'
	);
	$replace = array(
		'<strong>$1</strong>',
		'<br>',
		'<em>$1</em>',
		'<u>$1</u>',
		'<img src="$1" />',
		'<a href="$1">$1</a>',
		'<a href="$1">$2</a>'
	);
	$var = preg_replace($search, $replace, $var);
	return $var;
}

function getUserSend()
{
  $arFilter = array(
    "ACTIVE" => "Y",
    'ID' => \Bitrix\Main\Engine\CurrentUser::get()->getId()
  );
  $arParameters = array(
    "SELECT" => array("UF_USERS_DEALER", "WORK_COMPANY"),
  );
  $rsUsers = CUser::GetList("ID", "desc", $arFilter, $arParameters);
  $arDealer = $rsUsers->Fetch();
  return $arDealer;
}
/**
 * Функция пишет чек сообщения пришедшего из б24
*/
function setCheckMess( $idChat ){
  \Bitrix\Main\Loader::IncludeModule("highloadblock");
  $hlblock_id = 28; // ID вашей HL-таблицы
  $hlblock = Bitrix\Highloadblock\HighloadBlockTable::getById($hlblock_id)->fetch();
  $entity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
  $entity_data_class = $entity->getDataClass();
  $filter = array(
    'UF_ID_CHAT' => $idChat
  );
  $rsData = $entity_data_class::getList(array(
    "select" => array("*"),
    "filter" => $filter
  ))->Fetch();

  $currentCount = $rsData['UF_COUNT'] ?? 0;
  $summCount = $currentCount + 1;
  if( $currentCount > 0){
    ;
    $result = $entity_data_class::update(
      $rsData['ID'],
      [ 'UF_COUNT' => $summCount ]
    );
  }else {

    $result = $entity_data_class::add(
      [ 'UF_ID_CHAT' => $idChat, 'UF_COUNT' => $summCount ]
    );
  }


  return $result;
}