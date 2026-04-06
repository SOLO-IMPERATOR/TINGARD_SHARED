<?php
AddEventHandler('main', 'OnUserTypeBuildList', ['CellarOptionUserType', 'GetUserTypeDescription']);

use Bitrix\Main\Web\Json;
use Bitrix\Main\Loader;


class CellarOptionUserType
{

    const USER_TYPE_ID = 'cellar_options_sizes';  // уникальный ID нашего поля

    const CELLAR_OTPION_HLID = 29;
    // описываем тип
    public static function GetUserTypeDescription()
    {
        return [
            'USER_TYPE_ID' => self::USER_TYPE_ID,
            'CLASS_NAME' => __CLASS__,
            'DESCRIPTION' => 'Опции погреба с дельтой цены',
            'BASE_TYPE' => 'string',
        ];
    }

    // вывод поля в форме редактирования записи HL-блока
    public static function GetEditFormHTML($arUserField, $arHtmlControl)
    {

        CUtil::InitJSCore(array('jquery'));
        $valueJson = $arHtmlControl['VALUE'];
        ?>

        <style>
            .data_upper {
                display: flex;
                gap: 20px;
                margin-top: 15px;
                position: relative;
                align-items: center;
                border-bottom: 2px solid black;
                flex-direction: column;

            }

            .data_upper .data span {
                color: red;
                cursor: pointer;
            }

            .data_upper>span {
                cursor: pointer;
                color: blue;
            }

            .data {
                display: flex;
                gap: 20px;
                align-items: center;
            }

            .dop_data {
                display: flex;
                flex-direction: column;
                border: 1px solid black;
                padding: 15px;
                margin-top: 10px;
                margin-bottom: 10px;
                position: relative;
            }

            .dop_data span {
                cursor: pointer;
                color: red;
                right: 2px;
                position: absolute;
                top: 2px;
            }
        </style>
        <script>

            let previousSeria = null;
            let valjson = null;
            BX.ready(function () {
                previousSeria = $('select[name="UF_CELLAR_SIZE_SERIA"]').val();
                try {
                    valjson = JSON.parse($('#UF_CELLAR_SIZE_OPTION_PRICE').val());
                } catch (e) {
                    valjson = null;
                }
                if (previousSeria != null && valjson != null) {
                    (async () => {
                        await loadOptions(previousSeria, valjson);
                    })();
                }
            });
            let loadDataOtpions = null;
            async function loadOptions(seria, valjson) {
                let select = document.getElementById('option_data');
                try {
                    if (!seria) {
                        select.innerHTML = "<option value='null' selected disabled>Выберите серию</option>";
                        $('.data_upper').remove();
                        return;
                    }

                    const response = await fetch(`/local/api/cellar/series/${seria}/options/`, {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                        },
                    });
                    const result = await response.json();
                    let htmlResult = "<option value='null'>Выберите значение</option>";
                    if (result?.data?.length) {
                        loadDataOtpions = result.data;
                        result.data.forEach(element => {
                            htmlResult += `<option value="${element.ID}">${element.UF_CELLAR_OPTION_NAME}</option>`;
                        });
                    }
                    select.innerHTML = htmlResult;
                    if (valjson) {
                        console.log(valjson);
                        valjson.forEach(element => {
                            let resultHtml = `
                    <div class="data_upper">
                        <div class='data'>
                            <label>${$(`#option_data option[value="${element.id}"]`).text()}</label><input data-val-id=${element.id} value="${element.price}" placeholder='Стоимость' type='number'>
                            <div><img width="200" src="${element.file1}">  <input type='file' data-target-input='val${element.id}_image_1'></div>
                            <div><img width="200" src="${element.file2}"> <input type='file' data-target-input='val${element.id}_image_2'></div>
                            <input type='hidden' name='image_1' value='${element.file1}' id='val${element.id}_image_1'>
                            <input type='hidden' name='image_2' value='${element.file2}' id='val${element.id}_image_2'>
                            <input type='text' name="zindex" value="${element.zindex}" placeholder="Порядок наложения">
                            <span>x</span>
                        </div>
                        <span class="dop_data_change">+</span>`;
                            element.dopdata.forEach(dop => {
                                newSelectOption = loadSelect(dop.id);
                                resultHtml += `<div class="dop_data">
                                <label>Опция изменяет картинки другой опции?</label>
                                ${newSelectOption}
                                <div><img width="200" src="${dop.file1}"></div>
                                <div><img width="200" src="${dop.file2}"></div>
                                <div><img width="200" src="${dop.file3}"></div>
                                <input type='hidden' name='image_1' value='${dop.file1}'>
                                <input type='hidden' name='image_2' value='${dop.file2}'>
                                <input type='hidden' name='image_3' value='${dop.file3}'>
                                <input type='text' name="zindex" value="${dop.sub_zindex}" placeholder="Порядок наложения">
                                <span>X</span>
                                </div>
                            `;
                            });
                            resultHtml += "</div>"
                            $('#option_data').after(resultHtml);
                            $(`#option_data option[value="${element.id}"]`).remove();
                        });
                    } else {
                        $('.data_upper').remove();
                    }

                } catch (e) {
                    select.innerHTML = "<option value='null' selected disabled>Выберите серию</option>";
                    console.error('Ошибка при запросе:', e);
                }
            }
            $('body').on('change', 'select[name="UF_CELLAR_SIZE_SERIA"]', function () {
                if (previousSeria) {
                    let reallyWant = confirm('Вы действительно хотите изменить привязку размера к другой серии? (текущие повышения цен пропадут, если они есть)');
                    if (!reallyWant) {
                        $('select[name="UF_CELLAR_SIZE_SERIA"]').val(previousSeria);
                        return;
                    }
                }
                previousSeria = $(this).val(); // сохраняем текущее значение как предыдущее
                (async () => {
                    await loadOptions($(this).val());
                })();

            });
            $('body').on('change', '#option_data', function () {
                let val = $('#option_data option:selected').val();
                if (val == 'null')
                    return;
                let text = $('#option_data option:selected').text();
                $('#option_data option:selected').remove();
                $('#option_data').after(`<div class="data_upper">
            <div class='data'>
                <label>${text}</label><input data-val-id='${val}' placeholder='Стоимость' type='number'>
                <input type='file' data-target-input='val${val}_image_1'>
                <input type='file' data-target-input='val${val}_image_2'>
                <input type='hidden' name='image_1' id='val${val}_image_1'>
                <input type='hidden' name='image_2' id='val${val}_image_2'>
                <input type='text' name="zindex" placeholder="Порядок наложения">
                <span>x</span>
            </div>
            <span class="dop_data_change">+</span>
       </div>`);
            })
            let dopValArray = [];

            function loadSelect(id = false) {
                let newSelectOption = "<select name='setoption'>";
                loadDataOtpions.forEach(item => {
                    if (id && id == item.ID) {
                        newSelectOption += `<option selected value='${item.ID}'>${item.UF_CELLAR_OPTION_NAME}</option>`;
                    } else {
                        newSelectOption += `<option value='${item.ID}'>${item.UF_CELLAR_OPTION_NAME}</option>`;
                    }

                });
                newSelectOption += "</select>";
                return newSelectOption;
            }

            $('body').on('click', '.dop_data_change', function () {
                let val = $('#option_data option:selected').val();
                newSelectOption = loadSelect();
                dopValArray[val] = dopValArray[val] == null ? 0 : dopValArray[val] + 1;
                $(this).after(`
            <div class="dop_data">
                <label>Опция изменяет картинки другой опции?</label>
                ${newSelectOption}
                <input type='file' data-target-input='val${val}_subval${dopValArray[val]}_image_1'>
                <input type='file' data-target-input='val${val}_subval${dopValArray[val]}_image_2'>
                <input type='file' data-target-input='val${val}_subval${dopValArray[val]}_image_3'>
                <input type='hidden' name='image_1' id='val${val}_subval${dopValArray[val]}_image_1'>
                <input type='hidden' name='image_2' id='val${val}_subval${dopValArray[val]}_image_2'>
                <input type='hidden' name='image_3' id='val${val}_subval${dopValArray[val]}_image_3'>
                <input type='text' name="zindex" placeholder="Порядок наложения">
                <span>x</span>
            </div>
        `);
            });
            $('body').on('click', '.data_upper .data span', function () {
                let conf = confirm('Вы действительно хотите удалить цену опции?');
                if (!conf)
                    return;
                $('#option_data').append(`<option value="${$(this).siblings('input').attr('data-val-id')}">${$(this).siblings('label').text()}</option>`);
                $(this).parent().parent().remove();
            });
            $('body').on('click', '.dop_data span', function () {
                let conf = confirm('Вы действительно хотите удалить изменение опции?');
                if (!conf)
                    return;
                $(this).parent().remove();
            });



            $('body').on('change', '.data_upper input[type="file"]', function () {
                const fileInput = this;
                const file = fileInput.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const base64 = e.target.result;
                        const targetInputId = fileInput.getAttribute('data-target-input');

                        // Сохраняем base64 в скрытое поле
                        $(`#${targetInputId}`).val(base64);
                    };

                    reader.readAsDataURL(file);  // Преобразуем файл в base64
                }
            });


            BX.ready(function () {
                const form = BX.findParent(BX('option_data'), { tag: 'form' });
                if (!form) return;

                BX.bind(form, 'submit', function (e) {
                    const entries = [];
                    $('.data_upper').each(function () {
                        const id = $(this).find('input[type="number"]').attr('data-val-id');
                        const value = $(this).find('input[type="number"]').val();
                        const file1 = $(this).find('input[name="image_1"]').val();
                        const file2 = $(this).find('input[name="image_2"]').val();
                        const zindex = $(this).find('input[name="zindex"]').val();
                        let dopdata = [];
                        if ($(this).find('.dop_data')) {
                            $(this).find('.dop_data').each(function () {
                                const sub_id = $(this).find('select[name="setoption"]').val();
                                const sub_file1 = $(this).find('input[name="image_1"]').val();
                                const sub_file2 = $(this).find('input[name="image_2"]').val();
                                const sub_file3 = $(this).find('input[name="image_3"]').val();
                                const sub_zindex = $(this).find('input[name="zindex"]').val();
                                dopdata.push({ id: sub_id, file1: sub_file1, file2: sub_file2, file3: sub_file3, sub_zindex });
                            })
                        }
                        entries.push({ id: id, price: value, file1: file1, file2: file2, zindex: zindex, dopdata: dopdata });
                    });

                    const json = JSON.stringify(entries);

                    const hiddenInput = document.querySelector('input[name="UF_CELLAR_SIZE_OPTION_PRICE"]');
                    if (hiddenInput) {
                        hiddenInput.value = json;
                    } else {
                        console.warn('Не найден input[name="UF_CELLAR_SIZE_OPTION_PRICE"]');
                    }
                    console.log("Собранный JSON для сохранения:", json);
                });
            });

        </script>
        <?
        return "<input type='hidden' id='UF_CELLAR_SIZE_OPTION_PRICE' value='" . $valueJson . "' name='" . $arHtmlControl["NAME"] . "'><select id='option_data'><option value='null' selected disabled>Выберите серию</option></select>";
    }

    // для списка записей в админке просто покажем JSON
    public static function GetAdminListViewHTML($arUserField, $arHtmlControl)
    {
        return htmlspecialchars($arUserField['VALUE']);
    }

    public static function GetDBColumnType($arUserField)
    {
        global $DB;
        return $DB->type === 'MYSQL' ? 'text' : 'CLOB';
    }


}





use Bitrix\Main\Event;
use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\ORM\EventManager;
use Bitrix\Main\Application;
const LOG_FILE = __DIR__ . "/log.txt";
Loader::includeModule('highloadblock');


$hlblock = HighloadBlockTable::getById(29)->fetch();
$entity = HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();

EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterUpdate', 'deleteCacheCellarHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterDelete', 'deleteCacheCellarHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterAdd', 'deleteCacheCellarHighLoadBlock');
function deleteCacheCellarHighLoadBlock()
{
    $taggedCache = Application::getInstance()->getTaggedCache();
    $taggedCache->clearByTag('hlblock_id_29');
    $taggedCache->clearByTag('hlblock_id_30');
}




$hlblock = HighloadBlockTable::getById(30)->fetch();
$entity = HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();

EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterDelete', 'deleteCacheCellarHighLoadBlock');
EventManager::getInstance()->addEventHandler($entityClass, 'OnAfterAdd', 'deleteCacheCellarHighLoadBlock');
EventManager::getInstance()->addEventHandler(
    $entityClass,
    'OnAfterUpdate',
    function (Event $event) use ($entityClass) {
        deleteCacheCellarHighLoadBlock();
        $id = $event->getParameter('id')['ID'];
        $fields = $event->getParameter('fields');

        // 4) Если есть base64-JSON — обрабатываем
        if (!empty($fields['UF_CELLAR_SIZE_OPTION_PRICE'])) {
            $jsonData = Json::decode($fields['UF_CELLAR_SIZE_OPTION_PRICE']);
            $changed = false;

            foreach ($jsonData as &$item) {
                foreach (['file1', 'file2'] as $key) {
                    if (!empty($item[$key]) && preg_match('#^data:image/(\w+);base64,#i', $item[$key], $m)) {
                        // decode & save
                        $ext = mb_strtolower($m[1]) === 'jpeg' ? 'jpg' : $m[1];
                        $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $item[$key]);
                        $data = base64_decode($base64);
                        $fileName = 'hl_sizes_' . uniqid() . '.' . $ext;
                        $tmpPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/tmp_' . $fileName;
                        file_put_contents($tmpPath, $data);

                        $arFile = [
                            'name' => $fileName,
                            'type' => 'image/' . $ext,
                            'tmp_name' => $tmpPath,
                            'MODULE_ID' => 'main',
                        ];
                        $fid = \CFile::SaveFile($arFile, 'hl_images');
                        unlink($tmpPath);

                        if ($fid) {
                            // подставляем уже URL
                            $item[$key] = \CFile::GetPath($fid);
                            $changed = true;
                        }
                    }
                    foreach ($item['dopdata'] as &$subitem) {
                        foreach (['file1', 'file2', 'file3'] as $subkey) {
                            if (!empty($subitem[$subkey]) && preg_match('#^data:image/(\w+);base64,#i', $subitem[$subkey], $m)) {
                                // decode & save
                                $ext = mb_strtolower($m[1]) === 'jpeg' ? 'jpg' : $m[1];
                                $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $subitem[$subkey]);
                                $data = base64_decode($base64);
                                $fileName = 'hl_sizes_' . uniqid() . '.' . $ext;
                                $tmpPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/tmp_' . $fileName;
                                file_put_contents($tmpPath, $data);

                                $arFile = [
                                    'name' => $fileName,
                                    'type' => 'image/' . $ext,
                                    'tmp_name' => $tmpPath,
                                    'MODULE_ID' => 'main',
                                ];
                                $fid = \CFile::SaveFile($arFile, 'hl_images');
                                unlink($tmpPath);

                                if ($fid) {
                                    // подставляем уже URL
                                    $subitem[$subkey] = \CFile::GetPath($fid);
                                    $changed = true;
                                }
                            }
                        }
                    }
                    unset($subitem);
                }
            }

            unset($item);

            if ($changed) {
                $newJson = Json::encode($jsonData);
                // 5) Обновляем только JSON-поле
                $entityClass::update($id, [
                    'UF_CELLAR_SIZE_OPTION_PRICE' => $newJson
                ]);
            }
        }
    }
);


function getFileByElementId($elementId, $iblockId, $propertyCode = 'FILE')
{
    if (!Loader::includeModule('iblock')) {
        return false;
    }

    $elementId = (int) $elementId;
    $iblockId = (int) $iblockId;
    $propertyCode = trim($propertyCode);

    if ($elementId <= 0 || $iblockId <= 0 || empty($propertyCode)) {
        return false;
    }

    $res = CIBlockElement::GetList(
        [],
        [
            'ID' => $elementId,
            'IBLOCK_ID' => $iblockId,
            'ACTIVE' => 'Y',
        ],
        false,
        false,
        ['ID', 'IBLOCK_ID', "PROPERTY_$propertyCode"]
    );

    if ($ob = $res->GetNext()) {
        $fileId = $ob["PROPERTY_{$propertyCode}_VALUE"];
        if ($fileId) {
            $file = CFile::GetFileArray($fileId);
            return $file;
        }
    }

    return false;
}

