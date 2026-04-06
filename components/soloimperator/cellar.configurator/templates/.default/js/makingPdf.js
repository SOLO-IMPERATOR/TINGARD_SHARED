export async function makePdf(cellarPhotoSize, cellarCharacters, allOptionForPdf, base_price, dop_price, sizeName, seriaName, userData) {
  const fillSet = `<svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0H38.7972V38.8035H0V0ZM35.4935 35.304V3.49947H3.30362V35.304H35.4935Z" fill="#231F20"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5771 10.6938H28.2181V28.1098H10.5771V10.6938Z" fill="#231F20" stroke="#231F20" stroke-width="0.755867" stroke-miterlimit="22.9256"/>
    </svg>
    `;
  const voidSet = `<svg width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.0644531 0.748535H38.8616V39.552H0.0644531V0.748535ZM35.558 36.0525V4.26429H3.36807V36.0525H35.558Z" fill="#231F20"/>
    </svg>
    `;

  function sanitizeHtmlForBitrix(html) {
    return html
      .replace(/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi, "")
      .replace(/on\w+="[^"]*"/g, "")
      .replace(/javascript:/gi, "");
  }

  function rublesFormat(number) {
    return new Intl.NumberFormat("ru-Ru", {
      style: "decimal",
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(number);
  }

  let htmlConntent = `
    <body>
        <div class="a4_container">
            <div class="head">
                <img src="https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/img/logo.svg" alt="Tinger">
                <div >
                    TINGERPLAST ООО «ТехС»<br>
                    162611, РФ, Вологодская область, г. Череповец<br>
                    ул. Окружная, д. 18, строение 6, офис 1
                </div>
                <div class="head_links">
                    <div><img src="https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/img/phone.svg"><a href="tel:+78001003532">8 (800) 100-35-32</a></div>
                    <div><img src="https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/img/email.svg"><a href="mailto:sales@tingerplast.ru">sales@tingerplast.ru</a></div>
                    <div><img src="https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/img/site.svg"><a href="https://www.tingard.ru">www.tingard.ru</a></div>
                </div>
            </div>
            <h1>Пластиковый бесшовный погреб, серия ${seriaName}</h1>
            <h2><img src="https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/img/polosa.svg"><span>TINGARD ${seriaName} ${sizeName}</span></h2>
            <div class="main_info">
                <table>
                    <tbody>
                        <tr><td class="blue">Габариты погреба (Д х Ш х В)</td></tr>
                        <tr><td>${cellarCharacters.gabarite}</td></tr>
                        <tr><td class="blue">Габариты люка (Д х Ш)</td></tr>
                        <tr><td>${cellarCharacters.gabarite_door}</td></tr>
                        <tr><td class="blue">Толщина стенок</td></tr>
                        <tr><td>${cellarCharacters.cellar_wall_size}</td></tr>
                        <tr><td class="blue">Масса</td></tr>
                        <tr><td>${cellarCharacters.wieght}</td></tr>
                        <tr><td class="blue">Герметичность</td></tr>
                        <tr><td>${cellarCharacters.germ}</td></tr>
                        <tr><td class="blue">Материал</td></tr>
                        <tr><td>${cellarCharacters.material}</td></tr>
                        <tr><td class="blue">Срок эксплуатации</td></tr>
                        <tr><td>${cellarCharacters.time}</td></tr>
                    </tbody>
                </table>
                <div>
                    <img src="${cellarPhotoSize}">
                    <span>
                        Погреб подходит для установки<br>
                        при любом уровне грунтовых вод
                    </span>
                    <b>Пожизненная гарантия от <br>производителя</b>
                </div>
            </div>
            <h2><img src="https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/img/polosa.svg"><span>Стандартная комплектация</span></h2>
            <table class="character">
                <tbody>
                    <tr>
                        <td class="blue">Металлический каркаc</td>
                        <td class="blue">Деревянный настил</td>
                    </tr>
                    <tr>
                        <td>Металлическая лестница</td>
                        <td>Деревянные полки</td>
                    </tr>
                    <tr>
                        <td class="blue">Утепленная крышка-люк с поручнем</td>
                        <td class="blue">Метеостанция</td>
                    </tr>
                    <tr>
                        <td>Встроенное светодиодное освещение</td>
                        <td>Оклад</td>
                    </tr>
                    <tr>
                        <td class="blue">Приточно-вытяжная вентиляция</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <h2><img src="https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/img/polosa.svg"><span>Преимущества</span></h2>
            <table class="character lastonpage">
                <tbody>
                    <tr><td class="blue">Мы поможем подобрать оптимальный способ доставки</td></tr>
                    <tr><td>Нет листов ожидания</td></tr>
                </tbody>
            </table>
            <span class="itog">Базовая цена модели: <b>${rublesFormat(base_price)}</b> ₽</span>
            <span class="itog">Цена дополнительной комплектации: <b>${rublesFormat(dop_price)}</b> ₽</span>
  <span class="itog">Итоговая стоимость: <b>${rublesFormat(parseFloat(dop_price) + parseFloat(base_price))}</b> ₽</span>
            <div class="pagebreak_before"></div>
            <h2><img src="https://tingard.ru/local/components/soloimperator/cellar.configurator/templates/.default/img/polosa.svg"><span>Дополнительная комплектация</span></h2>
    `;

  let dopOptions = `<table class="dop">
                <thead>
                    <tr class="blue_tr">
                        <th>Название</th>
                        <th>Характеристики</th>
                        <th>Цена</th>
                        <th>Выбрано</th>
                    </tr>
                </thead>
                <tbody>`;
  allOptionForPdf.forEach((item, index) => {
    dopOptions += `<tr class="${(index + 1) % 2 === 0 ? "blue_tr" : ""}">
                        <td>
                            <span class="name">${item.name}</span>
                            <img src="${item.img}" alt="test">
                        </td>
                        <td>
                            <ul>
                                ${item.characters.map((ch) => `<li>${ch}</li>`).join("")}
                            </ul>
                        </td>
                        <td class="dprice">${rublesFormat(item.price)} ₽</td>
                        <td>${item.select == true ? fillSet : voidSet}</td>
                    </tr>`;
  });

  dopOptions += `</tbody></table>`;
  htmlConntent += dopOptions;
  htmlConntent += `</div></body></html>`;
  htmlConntent = sanitizeHtmlForBitrix(htmlConntent);
  let result = false;
  const b24trace = b24Tracker.guest.getTrace();
  let metrikaclientid = 0;
  ym(32216254, "getClientID", function (clientID) {
    metrikaclientid = clientID;
  });

  const response = await fetch("https://tingard.ru/local/api/cellarpdf/generate_pdf.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      htmlpdf: htmlConntent,
      userData: userData,
      trace: b24trace,
      metrikaid: metrikaclientid,
    }),
  });
  const data = await response.json();
  if (data.status == "success") {
    return true;
  }
  return false;
}

