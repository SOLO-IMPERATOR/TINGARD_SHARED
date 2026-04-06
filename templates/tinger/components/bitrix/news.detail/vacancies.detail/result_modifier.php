<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arUserResult = CUser::GetByID($arResult['PROPERTIES']['MANAGER']['VALUE']); 
$arUser = $arUserResult->Fetch(); 

/* echo '<pre>'; print_r($arUser); echo '</pre>'; */

$arResult['PROPERTIES']['MANAGER']['MANAGER_NAME'] = $arUser['NAME'] . ' ' . $arUser['LAST_NAME'];
$arResult['PROPERTIES']['MANAGER']['MANAGER_PHOTO_SRC'] = CFile::GetPath($arUser['PERSONAL_PHOTO']);
$arResult['PROPERTIES']['MANAGER']['MANAGER_PHONE'] = $arUser['PERSONAL_PHONE'];

$arResult['DETAIL_PICTURE']['WEBP_SRC_1280_720'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 1280, 720, false);
$arResult['DETAIL_PICTURE']['WEBP_SRC_480_270'] = Pict::getResizedWebpSrc($arResult['DETAIL_PICTURE'], 480, 270, false);

if (isset($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['FILE_VALUE'])) {
	$arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['WEBP_SRC_1280_720'] = Pict::getResizedWebpSrc($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['FILE_VALUE'], 1280, 720, false);
	$arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['WEBP_SRC_480_270'] = Pict::getResizedWebpSrc($arResult['DISPLAY_PROPERTIES']['ADDITIONAL_PHOTO']['FILE_VALUE'], 480, 270, false);
}

$getSectionFields = CIBlockSection::GetList(
	array(),
	array(
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'ID' => $arResult['IBLOCK_SECTION_ID']
	),
	false,
	array(
		'UF_VACANCY_GALLERY'
	)
);

if ($sectionFields = $getSectionFields->GetNext()) { 
	$galleryItems = $sectionFields['UF_VACANCY_GALLERY'];
}

foreach ($galleryItems as $key => $value) {
	$rsFile = CFile::GetByID($value);
	$arFile = $rsFile->Fetch();
	$arResult['SECTION_GALLERY'][$key]['WEBP_SRC_1280_720'] = Pict::getResizedWebpSrc($arFile, 1280, 720, false);
	$arResult['SECTION_GALLERY'][$key]['WEBP_SRC_480_270'] = Pict::getResizedWebpSrc($arFile, 480, 270, false);
}