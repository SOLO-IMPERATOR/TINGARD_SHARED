<?
namespace Local\Iblock;
class ElementAddHandler
{
    public static function onAfterAdd(&$arFields)
    {
        // Проверим: успешное добавление
        if (!$arFields['ID'] || $arFields['RESULT'] !== true) {
            return;
        }

        // Получаем данные о добавленном элементе
        $res = \CIBlockElement::GetByID($arFields['ID']);
        if (!$arItem = $res->GetNextElement()) {
            return;
        }
        
        $props = $arItem->GetProperty();
        $fields = $arItem->GetFields();
        file_put_contents(__DIR__.'/test.txt',  print_r($fields,true),FILE_APPEND);
        if ((int)$fields['IBLOCK_ID'] !== 70) {
            return;
        }
        // Отправим данные на вебхук
       /* $webhookUrl = 'https://your.bitrix24.ru/rest/1/XXXXXXXXX/webhook/';
        $client = new HttpClient();
        $client->post($webhookUrl, [
            'ID' => $arItem['ID'],
            'NAME' => $arItem['NAME'],
            'IBLOCK_ID' => $arItem['IBLOCK_ID'],
        ]);*/

        // Отправим почтовое событие

        $attachmentId = null;
        if (!empty($props['FILE']['VALUE'])) {
            if (is_array($props['FILE']['VALUE'])) {
                $attachmentId = $props['FILE']['VALUE']; // массив ID
            } else {
                $attachmentId = [$props['FILE']['VALUE']]; // один ID
            }
        }

        Event::send([
            "EVENT_NAME" => "NEW_CELLAR_ORDER",
            "LID" => SITE_ID,
            "C_FIELDS" => [
                "EMAIL" =>  $props['EMAIL'],
                "FILE" => $attachmentId
            ]
        ]);
    }
}