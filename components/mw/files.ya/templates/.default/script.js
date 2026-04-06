/* 
 Comment Text 
*/

BX.ready(function ()
{
    let sectionBox = document.getElementById('replaceContent');

    // проваливание в папке
    BX.bindDelegate(
        document.body, 'click', { className: 'type_dir' },
        function (e)
        {
            if (!e)
            {
                e = window.event;
            }
            console.log('папка')
            let pathDir = this.getAttribute('href');
            let formRoot = document.getElementById('lk__form-root');
            data = new FormData(formRoot);
            BX.ajax({
                url: '/local/ajax/yafiles.php?data=' + pathDir,  //адрес на который передаются данные с формы
                method: 'POST',         //метод передачи данных POST или GET
                dataType: 'html',       //тип передаваемых данных
                data: data,
                processData: false,     //
                preparePost: false,     //предобработка передаваемых данных
                onsuccess: function (data)
                {  //в случаи успеха, выполняем действия


                    console.log(data);

                    // const sectionDir = document.querySelector('#sectionDir');
                    // var parser = new DOMParser();
                    // var doc = parser.parseFromString(data, 'text/xml');
                    //
                    // let newSectionDir = doc.querySelector('#sectionDir');
                    // if (newSectionDir)
                    // {
                    //     sectionDir.replaceWith(newSectionDir); // Заменяем элемент
                    // }
                    //
                    // console.log(doc); //выводим полученные данные в результате успеха.
                    // let tempData = document.createElement('html')
                    // tempData.innerHTML = data;
                    // let replaceBloc = tempData.getElementById('sectionDir');
                    // sectionBox.replaceWith(data) //= data;
                    sectionBox.innerHTML = data;
                },
                onfailure: function ()
                {  //действия в случаи ошибки
                    console.log('error') //выводим в результате ошибки, сообщение об ошибки
                }
            });
            return BX.PreventDefault(e);
        }
    );
    // скачивание файла
    BX.bindDelegate(
        document.body, 'click', { className: 'files__item_type_file' },
        function (e)
        {
            if (!e)
            {
                e = window.event;
            }
            console.log('Скачивание файла')
            let pathDir = this.getAttribute('href');
            let nameFile = this.getAttribute('data-namefile');
            console.log(nameFile, 'Скачивание файла')
            data = new FormData();
            data.append('downloadPath', pathDir)
            BX.ajax({
                url: '/local/ajax/load_files_ya.php',  //адрес на который передаются данные с формы
                method: 'POST',         //метод передачи данных POST или GET
                dataType: 'html',       //тип передаваемых данных
                data: data,
                processData: false,     //
                preparePost: false,     //предобработка передаваемых данных
                onsuccess: function (data)
                {  //в случаи успеха, выполняем действия
                    console.log(data); //выводим полученные данные в результате успеха.
                    // sectionBox.innerHTML = data;
                    window.open('/upload/ya/' + nameFile, "_blank")
                },
                onfailure: function ()
                {  //действия в случаи ошибки
                    console.log('error') //выводим в результате ошибки, сообщение об ошибки
                }
            });
            return BX.PreventDefault(e);
        }
    );

});




// BX.ready(function(){
//     console.log('Отправка заявки');
//     let dirButton = document.querySelectorAll('.type_dir');
//     let sectionBox = document.getElementById('sectionDir');
//     console.log('папка', pathDir)
//     dirButton.forEach((element)=> {
//
//         element.addEventListener('onclick', function () {
//             let pathDir = this.getAttribute('href');
//             let arUrls = ['mwtest/маркетинг']
//             console.log('папка', pathDir)
//             BX.ajax({
//                 url: '/local/ajax/yafiles.php',  //адрес на который передаются данные с формы
//                 method: 'POST',         //метод передачи данных POST или GET
//                 dataType: 'html',       //тип передаваемых данных
//                 data: arUrls,
//                 processData: false,     //
//                 preparePost: false,     //предобработка передаваемых данных
//                 onsuccess: function(data){  //в случаи успеха, выполняем действия
//                     console.log(data); //выводим полученные данные в результате успеха.
//                     sectionBox.innerHTML = data;
//                 },
//                 onfailure: function(){  //действия в случаи ошибки
//                     console.log('error') //выводим в результате ошибки, сообщение об ошибки
//                 }
//             });
//         });
//     });
//
//
// });
