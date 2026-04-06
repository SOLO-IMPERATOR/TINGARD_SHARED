<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
require $_SERVER['DOCUMENT_ROOT'] . '/local/composer/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
use Mw\Checklist\Generatehtml;
use Bitrix\Main\Diag\Debug;

//ignore_user_abort(true);
set_time_limit(0);

\Bitrix\Main\Loader::includeModule('iblock');
\Bitrix\Main\Loader::includeModule('mw.checklist');
$id   = $_GET['id'];
if( !empty($_GET['id']) ) $arID = explode(',', $_GET['id']);


if( $_GET['action'] == 'mass'){
    $htmlCode = Generatehtml::getHTMLpages($arID);
    $fileSafe = "/var/www/bitrix/data/www/shared/upload/document.pdf";

} else {
    $htmlCode = Generatehtml::getHTML($id);
    $fileSafe = "/var/www/bitrix/data/www/shared/upload/document_pdf_{$id}.pdf";
}
$options  = new Options();
$options->set('isRemoteEnabled',true);

$dompdf   = new Dompdf( $options );
$dompdf->loadHtml($htmlCode);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
$dompdf->render();

$canvas = $dompdf->get_canvas();
$font = $dompdf->getFontMetrics()->get_font("DejaVu Sans", "bold");
$canvas->page_text(250, 795, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0.565, 0.565, 0.565));
// Output the generated PDF to Browser
//$dompdf->stream();
$pdf = $dompdf->output();
file_put_contents($fileSafe, $pdf);
