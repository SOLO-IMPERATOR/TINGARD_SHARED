<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
	global $USER;

	$test = $arResult['DETAIL_TEXT'];
	$testResult = strip_tags(strip_tags($test));
	$testResult = str_replace(array("\r\n", "\r", "\n"), '', $test);

	if (mb_strlen($testResult) > 240) {
		$testResult = mb_strimwidth($testResult, 0, 240);
	}

	$testResult = substr($testResult, 0, strrpos($testResult, '.'));

	$APPLICATION->SetPageProperty('description', $testResult . '.'); 
?>

<main>
	<section class="news container margin_b_xl">
		<article class="news__inner">
			<div class="news__about">
				<h1 class="page-title margin_b_m"><?=$arResult['NAME']?></h1>
			</div>
			<div class="news__body">

				<div class="news__img-container">
					<img class="news__img margin_b_m" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult["NAME"]?>">
					<a class="play-btn glightbox" href="<?=$arResult['PROPERTIES']['VIDEO_LINK']['VALUE']?>"></a>
				</div>

				<div class="news__text margin_b_s">
					<?=$arResult["DETAIL_TEXT"]?>
				</div>
				<nav class="news__social">
					<ul class="news__social-list">
						<li class="news__social-item">
							<?=$arResult['ACTIVE_FROM']?>
						</li>
						<li class="news__social-item">
							<a id="copy-link" class="news__social-link">Скопировать ссылку</a>
						</li>
					</ul>
				</nav>
			</div>
		</article>
	</section>


	<input style="opacity:0;position:absolute;" type="text" value="Привет мир" id="myInput">

</main>