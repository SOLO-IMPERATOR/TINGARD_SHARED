/* 
 Comment Text 
*/

BX.ready(function(){

    const dropZone = document.querySelector(".lk__download-container");
    const uploadInput = document.querySelector(".form-control-file");
    const fileList = document.querySelector(".lk__form-list");
    const loadFileForm = document.getElementById('form_message');
    const errorBox = document.getElementById("error-box");
    const successBox = document.getElementById("success-box");
    const errorSizeBox = document.querySelector('#size-error-box');

    let files = [];
    const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB

    ["dragover", "drop"].forEach(event =>
    {
        document.addEventListener(event, e =>
        {
            e.preventDefault();
        });
    });

    dropZone.addEventListener("dragenter", () =>
    {
        dropZone.classList.add("_active");
    });

    dropZone.addEventListener("dragleave", () =>
    {
        dropZone.classList.remove("_active");
    });

    dropZone.addEventListener("drop", event =>
    {
        dropZone.classList.remove("_active");
        handleFiles(event.dataTransfer.files);
    });

    uploadInput.addEventListener("change", () =>
    {
        handleFiles(uploadInput.files);
    });

    function handleFiles(selectedFiles) {
        Array.from(selectedFiles).forEach(file => {
            if (file.size > MAX_FILE_SIZE) {
                displaySizeError(`Файл "${file.name}" превышает максимальный размер в 5MB.`);
                return;
            }
            if (!files.find(f => f.name === file.name)) {
                files.push(file);
                displayFile(file);
                clearSizeError();
            }
        });
        updateFileInput();
    }

    function displaySizeError(message) {
        errorSizeBox.textContent = message;
        errorSizeBox.style.display = 'block';
    }
    
    function clearSizeError() {
        errorSizeBox.textContent = '';
        errorSizeBox.style.display = 'none';
    }

    function displayFile(file)
    {
        const listItem = document.createElement("li");
        listItem.textContent = file.name;
        const removeButton = document.createElement("button");
        removeButton.textContent = "Удалить";
        removeButton.addEventListener("click", () =>
        {
            files = files.filter(f => f !== file);
            fileList.removeChild(listItem);
            updateFileInput();
        });
        listItem.appendChild(removeButton);
        fileList.appendChild(listItem);
    }

    function updateFileInput()
    {
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        uploadInput.files = dataTransfer.files;
    }

    
    let formUser = document.getElementById('form_message');
    let successSend = document.getElementById('success-box');
    let errorSend = document.getElementById('error-box');
    let requestResult = document.getElementById('requestResult')

    BX.bindDelegate(
        document.body, 'click', {className: 'btn_submit' },
        function(e){
            if(!e) {
                e = window.event;
            }
            data = new FormData(formUser);
            //files.forEach(file => data.append('inputFiles[]', file));

            // errorSend.style.display = 'none';
            BX.ajax({
                url: '/local/b24app/app/ajaxFile.php',  //адрес на который передаются данные с формы
                method: 'POST',         //метод передачи данных POST или GET
                dataType: 'html',       //тип передаваемых данных
                data: data,
                processData: false,     //
                preparePost: false,     //предобработка передаваемых данных
                onsuccess: function(data){  //в случаи успеха, выполняем действия
                    console.log(data)

                    document.querySelector('.lk__textarea[name="message"]').value = "";
                    files = [];
                    fileList.replaceChildren();

                    // let resultRequest = JSON.parse(data);
                    // console.log(resultRequest);
                    //successSend.style.display = 'block';
                },
                onfailure: function(){  //действия в случаи ошибки
                    console.log('error') //выводим в результате ошибки, сообщение об ошибки
                }
            });

            return BX.PreventDefault(e);
        }
    );
});
