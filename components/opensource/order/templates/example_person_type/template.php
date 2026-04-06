<?php

use Bitrix\Main\Error;
use Bitrix\Sale\Order;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<?//echo '<pre>'; print_r($arResult); echo '</pre>';?>

<div class="order order_person-type_<?=$arResult['PERSON_TYPE_ID']?>" role="main">
    <?if(count($component->errorCollection) > 0):?>
        <div class="note note_type_errortext">
            <?foreach($component->errorCollection as $error):?>
                <div><?= $error->getMessage() ?></div>
            <?endforeach?>
        </div>
    <?endif?>

    <?if (isset($arResult['ID']) && $arResult['ID'] > 0) {
        include 'done.php';
    } elseif ($component->order instanceof Order && count($component->order->getBasket()) > 0) {
        include 'form.php';
    } ?>
</div>