<?
require_once('function.php');
session_start();
//$chatID = 'chat' . md5($_SERVER['HTTP_ORIGIN']) . md5(session_id());
$chatID = 'chat'. \Bitrix\Main\Engine\CurrentUser::get()->getId();  // . md5($_SERVER['HTTP_ORIGIN']) . md5(session_id());
$type = $_POST['type'];
$connector_id = getConnectorID();
$line_id = getLine();
/*
	simple example save chat, must lost any data
	recommend using database
*/
if ($type == 'chat_history'):
	$arChat = getChat($chatID);
    $dateArChat = [];
    foreach ($arChat as $item){
       $dateArChat[$item['dateDay']][] = $item;
    }
    if (!empty($arChat)):
      $dateArChatSort = array_reverse($dateArChat);
      foreach ($dateArChatSort as $date=>$block){?>
          <div class="messages__date"><?=$date?></div>
        <?
        //сортировка
        $block = array_reverse($block);
        ?>
        <? foreach ($block as $item){
          $files = '';
          $objFiles = '';
          if( !empty($item['message']['files']) ){
            $files = json_encode($item['message']['files']);
            $fileParam = $item['message']['files'][0];
            // подставить $item['link'] - ссылка на файл в б24, $item['name'] - имя файла
            $link = $fileParam['link'] ?? $fileParam['url'];
            $nameFile = $fileParam['name'] ?? 'file';
            $objFiles = "<a class='message__doc' target='_blank' href=" . $link . ">".$nameFile."</a>";
          }
          ?>
              <div class="messages__item messages__item_type_dealer" data-files="<?=$files?>">
			  	<div class="messages__item-text"><?=convertBB($item['message']['text'])?></div>
				<?=$objFiles?>
              </div>
        <? } ?>
      <?}
    endif;
elseif ($type == 'send_message'):
    $uploadDir = '/var/www/bitrix/data/www/shared/upload/';
    $urlFiles = '';
    if($_FILES['inputFile']){

        $uploadFile = $uploadDir . basename($_FILES['inputFile']['name']);
        if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadFile)) {
            $urlFiles = 'https://tingerplast.ru/upload/'  . basename($_FILES['inputFile']['name']);
        }
    }
    $uploadFile = $uploadDir . basename($_FILES['inputFile']['name']);
	$arMessage = [
		'user' => [
			'id' => $chatID,
			'name' => getUserSend()['WORK_COMPANY'],
		],
		'message' => [
			'id' => false,
			'date' => time(),
			'text' => htmlspecialchars($_POST['message']),
            'files' => [
                   ['url' => $urlFiles ]
            ]
		],
		'chat' => [
			'id' => $chatID,
			'url' => htmlspecialchars($_SERVER['HTTP_REFERER']),
		],
	];
	$id = saveMessage($chatID, $arMessage);
	$result['error'] = 'error_save';
	if ($id !== false)
	{
		$arMessage['message']['id'] = $id;
		$result = CRestOL::call(
			'imconnector.send.messages',
			[
				'CONNECTOR' => $connector_id,
				'LINE' => $line_id,
				'MESSAGES' => [$arMessage],
			]
		);
        $result['dateDay'] = date('m.d.Y');
		echo json_encode(
			[
				$result
			]
		);
	}
	echo json_encode(
		[
			'chat' => $chatID,
			'post' => $_POST,
			'result' => $result
		]
	);
endif;
