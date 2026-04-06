<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die;

use Bitrix\Main\Context;
global $APPLICATION;

$session = \Bitrix\Main\Application::getInstance()->getSession();
$request = Context::getCurrent()->getRequest();
$requestPage = $request->getRequestedPageDirectory();

?>

<div class="overlay-wrapper">
    <div class="modal-city">
        <div class="wrap-modal-city">
            <button class="header__burger header__burger_active close-modal-city" type="button" title="Закрыть" >
				<span class="header__burger-line"></span>
			</button>
            <span class="title-modal-city">Выберите ваш город </span>
            <input class="input-search-city" type="text" placeholder="Ваш город" 
            autocapitalize="off" 
            autocomplete="off" 
            autocorrect="off" 
            spellcheck="false"
            inputmode="search">
            <svg class="search-icon" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 14.1174L11.0915 10.2089C12.1067 8.96717 12.6059 7.38272 12.4858 5.78327C12.3656 4.18382 11.6352 2.69175 10.4458 1.61568C9.25638 0.539605 7.69886 -0.0381362 6.0954 0.00195526C4.49195 0.0420467 2.96524 0.696903 1.83107 1.83107C0.696903 2.96524 0.0420467 4.49195 0.00195526 6.0954C-0.0381362 7.69886 0.539605 9.25638 1.61568 10.4458C2.69175 11.6352 4.18382 12.3656 5.78327 12.4858C7.38272 12.6059 8.96717 12.1067 10.2089 11.0915L14.1174 15L15 14.1174ZM6.26165 11.255C5.27406 11.255 4.30865 10.9621 3.4875 10.4135C2.66635 9.86479 2.02634 9.08494 1.64841 8.17252C1.27047 7.26011 1.17159 6.25611 1.36426 5.2875C1.55693 4.31889 2.0325 3.42916 2.73083 2.73083C3.42916 2.0325 4.31889 1.55693 5.2875 1.36426C6.25611 1.17159 7.26011 1.27047 8.17252 1.64841C9.08494 2.02634 9.86479 2.66635 10.4135 3.4875C10.9621 4.30865 11.255 5.27406 11.255 6.26165C11.2535 7.58551 10.7269 8.85473 9.79084 9.79084C8.85473 10.7269 7.58551 11.2535 6.26165 11.255Z" fill="#434343"/>
            </svg>
            <a href="#" class="detect-city">Определить автоматически</a>
            <ul class="list-city">
                <?foreach($arResult['CITIES'] as $key => $city):?>
                    <li data-city-code="<?=$key?>"><?=$city?></li>
                <?endforeach;?>
            </ul>
        </div>
    </div>
</div>


<?php 

if($session->get('B_GEOIP_DATA')['auto'] === true && str_contains($requestPage, '/catalog')){
ob_start();
?>
<div class="header-city-mobile">
    <div class="wrapper-city-mobile">
        <div class="block-city-mobile-up">
            <svg class="geo-image" width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.50019 4.47681C6.9101 4.47681 6.33325 4.65179 5.8426 4.97963C5.35195 5.30747 4.96954 5.77345 4.74372 6.31863C4.51789 6.86381 4.45881 7.46371 4.57393 8.04247C4.68905 8.62123 4.97321 9.15285 5.39048 9.57011C5.80774 9.98738 6.33936 10.2715 6.91812 10.3867C7.49688 10.5018 8.09678 10.4427 8.64196 10.2169C9.18714 9.99105 9.65312 9.60864 9.98096 9.11799C10.3088 8.62734 10.4838 8.05049 10.4838 7.4604C10.4838 6.6691 10.1694 5.91021 9.60991 5.35068C9.05038 4.79115 8.29149 4.47681 7.50019 4.47681ZM7.50019 8.95219C7.20514 8.95219 6.91672 8.8647 6.6714 8.70078C6.42607 8.53686 6.23486 8.30387 6.12195 8.03128C6.00904 7.75869 5.9795 7.45874 6.03706 7.16936C6.09462 6.87998 6.2367 6.61417 6.44534 6.40554C6.65397 6.19691 6.91978 6.05483 7.20916 5.99727C7.49854 5.9397 7.79849 5.96925 8.07108 6.08216C8.34367 6.19507 8.57665 6.38628 8.74058 6.6316C8.9045 6.87692 8.99199 7.16535 8.99199 7.4604C8.99199 7.85605 8.83482 8.23549 8.55505 8.51525C8.27529 8.79502 7.89584 8.95219 7.50019 8.95219Z" fill="#004182"/>
                <path d="M7.5 17.903C6.87191 17.9062 6.2522 17.7589 5.69274 17.4734C5.13328 17.1879 4.65037 16.7725 4.28444 16.2621C1.44182 12.3409 0 9.39309 0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0C9.48912 0 11.3968 0.790176 12.8033 2.1967C14.2098 3.60322 15 5.51088 15 7.5C15 9.39309 13.5582 12.3409 10.7156 16.2621C10.3496 16.7725 9.86672 17.1879 9.30726 17.4734C8.7478 17.7589 8.12809 17.9062 7.5 17.903ZM7.5 1.62829C5.94288 1.63007 4.45004 2.24942 3.34898 3.35048C2.24793 4.45153 1.62858 5.94437 1.6268 7.50149C1.6268 9.00075 3.03879 11.7732 5.60169 15.3081C5.81926 15.6077 6.1047 15.8517 6.43464 16.0198C6.76459 16.188 7.12966 16.2757 7.5 16.2757C7.87034 16.2757 8.23541 16.188 8.56536 16.0198C8.8953 15.8517 9.18073 15.6077 9.39831 15.3081C11.9612 11.7732 13.3732 9.00075 13.3732 7.50149C13.3714 5.94437 12.7521 4.45153 11.651 3.35048C10.55 2.24942 9.05712 1.63007 7.5 1.62829Z" fill="#004182"/>
            </svg>
            <div class="your-city">Ваш город
                <span class="name-city"><?=$session->get('B_GEOIP_DATA')['locationName']?><span>?<span></span>
            </div>
            <svg class="close-mobile-city" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="13" width="18" height="1.06667" transform="rotate(-45 0 13)" fill="#434343"/>
                <rect x="1" width="18" height="1.06667" transform="rotate(45 1 0)" fill="#434343"/>
            </svg>
        </div>
        <div class="btn-city-mobile">
            <button class="yes">Все верно</button>
            <button class="choose-city">Выбрать город</button>
        </div>

    </div>
</div>
<?
$content = ob_get_clean();
$APPLICATION->AddViewContent('city_select_page', $content);
}
?>
