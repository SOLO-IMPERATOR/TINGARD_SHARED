<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['SECTIONS'] as $key => $value) {

/*     if($arResult['SECTION']['DEPTH_LEVEL']>0) { */

        if (isset($value['DETAIL_PICTURE'])) {

            $rsFile = CFile::GetByID($value['DETAIL_PICTURE']);
            $arFile = $rsFile->Fetch();
            $arrImages[] = $arFile;
    
            $arResult['SECTIONS'][$key]['PICTURE']['PREVIEW_WEBP_SRC_440_440'] = Pict::getResizedWebpSrc($arFile, 440, 440, true);
            
            $arrImages = array();
            unset($rsFile);
            unset($arFile);
        }
/*     } */


	
}