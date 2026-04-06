<?

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss('/local/templates/tinger/css/components/configurator.css');
Asset::getInstance()->addCss('/local/templates/tinger/css/components/configurator-widget.css?v=1.1');
Asset::getInstance()->addCss($templateFolder . '/style.css');
?>
<?
$modelId = filter_input(INPUT_GET, 'modelId', FILTER_VALIDATE_INT);
$elementId = filter_input(INPUT_GET, 'elementId', FILTER_VALIDATE_INT);


?>
<div class="container-data">




<script>
    async function getPdf() {

        const button = document.querySelector('.btn.btn_color_green.get_pdf');
        if (button.classList.contains('disabled')) return;
        button.classList.add('disabled');
        button.textContent = "Загрузка...";
        const response = await fetch("https://<?= $_SERVER['HTTP_HOST'] ?>/local/api/vehicles/generate_pdf.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                htmlpdf: window.vehiclePDf,
                action: "get"
            }),
        });

        const data = await response.json();
        button.textContent = "Обработка результата...";
        if (data.status == "success") {
            const byteCharacters = atob(data.message);
            const byteNumbers = new Array(byteCharacters.length);

            for (let i = 0; i < byteCharacters.length; i++) {
                byteNumbers[i] = byteCharacters.charCodeAt(i);
            }

            const byteArray = new Uint8Array(byteNumbers);
            const blob = new Blob([byteArray], { type: 'application/pdf' });
            const blobUrl = URL.createObjectURL(blob);

            // Используем blobUrl для скачивания или отображения
            const a = document.createElement('a');
            const now = new Date();
            const dateTimeString =
                now.getFullYear() + '-' +
                (now.getMonth() + 1).toString().padStart(2, '0') + '-' +
                now.getDate().toString().padStart(2, '0') + ' ' +
                now.getHours().toString().padStart(2, '0') + ':' +
                now.getMinutes().toString().padStart(2, '0');
            const filename = window.vehicleModelName + ' - ' + dateTimeString + '.pdf';
            a.href = blobUrl;
            a.download = filename;
            a.click();
            button.textContent = "Скачать PDF";
            // Очищаем память
            URL.revokeObjectURL(blobUrl);
        } else {
            button.textContent = "Ошибка скачивания";
            setTimeout(() => {
                button.textContent = "Cкачать PDF";
            }, 2000);
            console.log(data);
        }
        button.classList.remove('disabled');
    }
</script>


<?
if ($arParams['CONFIG_TYPE'] === 'PRIVATE' || $elementId) {
    $isGet = false;

	if (!$elementId) {
        $modelId = $arParams['MODEL_ID'];
        $elementId = $arParams['ELEMENT_ID'];
    } else {
        $isGet = true;
    }
	
    ?>

    <div class="conf-loader">
        <div class="spinner"></div>
    </div>
    <div id="root"></div>

    <script type="module" data-isget="<?= $isGet ?>" id="vehicle-configurator-script" data-machine="<?= $elementId ?>"
        data-type="<?= $modelId ?>" src="<?= $templateFolder ?>/js/index-taxr2omE.js?v=2"></script>
    <?
} else { ?>
    <div class="conf-loader">
        <div class="spinner"></div>
    </div>
    <div id="root"></div>
    <script type="module" src="<?= $templateFolder ?>/js/index-taxr2omE.js?v=2"></script>
    <?

} ?>
<script>
    // После того как React загрузится и рендерится, скрываем прелоадер
    window.addEventListener('load', () => {
        const preloader = document.querySelector('.conf-loader');
        preloader.style.display = 'none';
    });
</script>
</div>