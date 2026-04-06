<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="rim-choice" data-entity="rim-choice">
	<div class="container">
		<h2 class="rim-choice__title section-title">Подбор пневмодиска</h2>
		<div class="rim-choice__inner">
			<div class="rim-choice__form-container">
				<div class="rim-choice__form">
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Название шины:</span>
						<input class="form-input" type="text" name="rim-name" data-name="Название шины">
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Диаметр диска, дюймов:</span>
						<input class="form-input" type="text" name="rim-diameter" data-name="Диаметр диска, дюймов">
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Вылет диска, мм:</span>
						<input class="form-input" type="text" name="rim-offset" data-name="Вылет диска, мм">
					</label>
					<label class="form-label "data-entity="data">
						<span class="form-input-name">Ширина диска, мм:</span>
						<input class="form-input" type="text" name="rim-width" data-name="Ширина диска, мм">
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Посадочный диаметр под ступицу, мм:</span>
						<input class="form-input" type="text" name="rim-landing" data-name="Посадочный диаметр под ступицу, мм">
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Разболтовка диска, мм:</span>
						<select class="select" name="rim-bolt" data-name="Разболтовка диска, мм">
							<option value="—">—</option>
							<option value="15x130">15x130</option>
							<option value="3x112">3x112</option>
							<option value="3x98">3x98</option>
							<option value="4x100">4x100</option>
							<option value="4x108">4x108</option>
							<option value="4x110">4x110</option>
							<option value="4x114.3">4x114.3</option>
							<option value="4x98">4x98</option>
							<option value="5x100">5x100</option>
							<option value="5x105">5x105</option>
							<option value="5x108">5x108</option>
							<option value="5x110">5x110</option>
							<option value="5x112">5x112</option>
							<option value="5x114.3">5x114.3</option>
							<option value="5x115">5x115</option>
							<option value="5x118">5x118</option>
							<option value="5x120">5x120</option>
							<option value="5x127">5x127</option>
							<option value="5x130">5x130</option>
							<option value="5x135">5x135</option>
							<option value="5x139.7">5x139.7</option>
							<option value="5x150">5x150</option>
							<option value="5x160">5x160</option>
							<option value="5x165">5x165</option>
							<option value="5x165.1">5x165.1</option>
							<option value="5x98">5x98</option>
							<option value="6x100">6x100</option>
							<option value="6x114.3">6x114.3</option>
							<option value="6x115">6x115</option>
							<option value="6x120">6x120</option>
							<option value="6x125">6x125</option>
							<option value="6x127">6x127</option>
							<option value="6x130">6x130</option>
							<option value="6x135">6x135</option>
							<option value="6x139.7">6x139.7</option>
							<option value="6x160">6x160</option>
							<option value="6x170">6x170</option>
							<option value="6x180">6x180</option>
							<option value="6x205">6x205</option>
							<option value="8x165.1">8x165.1</option>
						</select>
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Диаметр посадочных отверстий, мм:</span>
						<select class="select" name="rim-hole" data-name="Диаметр посадочных отверстий, мм">
							<option value="—">—</option>
							<option value="12">12</option>
							<option value="14">14</option>
							<option value="16">16</option>
							<option value="18">18</option>
							<option value="20">20</option>
							<option value="20">22</option>
						</select>
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Ширина посадки борта шины, мм:</span>
						<input class="form-input" type="text" name="rim-tire-bead-width" data-name="Ширина посадки борта шины, мм">
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Диаметр ступичного фланца, мм:</span>
						<input class="form-input" type="text" ame="rim-hub-flange-diameter" data-name="Диаметр ступичного фланца, мм">
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Количество дисков, шт.:</span>
						<input class="form-input" type="text" name="rim-number" data-name="Количество дисков, шт.">
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Цвет пластиковой крышки:</span>
						<select class="select" name="rim-color" data-name="Цвет пластиковой крышки">
							<option value="чёрный">чёрный</option>
							<option value="серый">серый</option>
							<option value="зелёный">зелёный</option>
							<option value="красный">красный</option>
							<option value="синий">синий</option>
							<option value="фиолетовый">фиолетовый</option>
						</select>
					</label>
					<label class="form-label" data-entity="data">
						<span class="form-input-name">Цвет диска:</span>
						<select class="select" name="rim-color" data-name="Цвет диска">
							<option value="чёрный (0 руб.)">чёрный (0 руб.)</option>
							<option value="серый (+500 руб.)">серый (+500 руб.)</option>
							<option value="зелёный (+500 руб.)">зелёный (+500 руб.)</option>
							<option value="красный (+500 руб.)">красный (+500 руб.)</option>
							<option value="синий (+500 руб.)">синий (+500 руб.)</option>
							<option value="фиолетовый (+500 руб.)">фиолетовый (+500 руб.)</option>
						</select>
					</label>
					<div class="rim-choice__btn-container">
						<button class="btn btn_color_green" type="button" onclick="openModal('default', {'crm-entity': 'lead', 'crm-title': 'Подбор пневмодиска по размерам', 'crm-sale-direction': '16522', 'action': 'rim-choice'})">Оставить заявку</button>
					</div>
				</div>
			</div>
			<div class="rim-choice__scheme">
				<div class="rim-choice__img-container">
					<img class="rim-choice__img" src="/local/templates/tinger/img/rim/rim-scheme-1.svg?v=3" alt="Схема диска 1">
				</div>
				<div class="rim-choice__img-container">
					<img class="rim-choice__img" src="/local/templates/tinger/img/rim/rim-scheme-2.svg?v=3" alt="Схема диска 2">
				</div>
			</div>
		</div>
	</div>
</section>