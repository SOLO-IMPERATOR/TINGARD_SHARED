<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/* echo '<pre>'; print_r($arResult); echo '</pre>'; */

$fileMap = [
    1486 => 6461,
    1487 => 6462,
    1688 => 6463,
    1488 => 6464,
    1708 => 6465,
    1489 => 6466,
	1490 => 6467,
	4717 => 6468,
	6252 => 6469,
];

$elementId = $arResult['ITEM']['ID'];

if (isset($fileMap[$elementId])) {
    $fileId = $fileMap[$elementId];
    $arFile = getFileByElementId($fileId, 49)['SRC'];
    
    if ($arFile) {
        $arResult['ITEM']['MANUAL_FILE'] = $arFile;
    }
}