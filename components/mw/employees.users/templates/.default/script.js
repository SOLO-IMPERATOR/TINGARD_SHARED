/* 
 Comment Text 
*/
BX.ready(function(){

	const getScrollbarWidth = () => {

		// Creating invisible container
		const outer = document.createElement('div');
		outer.style.visibility = 'hidden';
		outer.style.overflow = 'scroll'; // forcing scrollbar to appear
		outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
		document.body.appendChild(outer);
	
		// Creating inner element and placing it in the container
		const inner = document.createElement('div');
		outer.appendChild(inner);
	
		// Calculating difference between container's full width and the child width
		const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);
	
		// Removing temporary elements from the DOM
		outer.parentNode.removeChild(outer);
	
		return scrollbarWidth;
	
	}

    let deleteUser = document.querySelectorAll('.deleteUserTrue');
    let deleteUserView = document.querySelectorAll('.deleteUser');
    let upUsers = document.querySelectorAll('.upUsers');
    let closeButton = document.querySelectorAll('.closeModal');

    // модалка удаление
    deleteUserView.forEach((element)=> {
        element.addEventListener('click', function () {
			document.body.style.overflow = 'hidden'
			document.body.style.paddingRight = getScrollbarWidth() + 'px';
            let idUser = this.getAttribute('data-id');
            let idElement = 'modalDelete'+idUser;
            let modalBox = document.getElementById(idElement);
            modalBox.style.display = 'block';

        });
    });

    // закрытие модалки
    closeButton.forEach((element)=> {
        element.addEventListener('click', function () {
			document.body.style.paddingRight = '';
			document.body.style.overflow = '';
            let idModal = this.getAttribute('data-id');
            let idElement = 'modalDelete'+idModal;
            let modalBox = document.getElementById(idElement);
            modalBox.style.display = 'none';
        });
    });
    // удаление сотрудника
    deleteUser.forEach((element)=> {
        element.addEventListener('click', function () {
            let idUser = this.getAttribute('data-id');
            let idElement = 'formUser'+idUser;
            let formUserId = document.getElementById(idElement);
            let submitButton = this;
            submitButton.classList.add('btn_status_loading')
            data = new FormData(formUserId);
            console.log(data, 'форма');
            BX.ajax({
                url: '/local/ajax/delete_user.php',  //адрес на который передаются данные с формы
                method: 'POST',         //метод передачи данных POST или GET
                dataType: 'html',       //тип передаваемых данных
                data: data,
                processData: false,     //
                preparePost: false,     //предобработка передаваемых данных
                onsuccess: function(data){  //в случаи успеха, выполняем действия
                    console.log(data); //выводим полученные данные в результате успеха.
                    submitButton.classList.remove('btn_status_loading');
                    location.reload();
                },
                onfailure: function(){  //действия в случаи ошибки
                    console.log('error') //выводим в результате ошибки, сообщение об ошибки
                }
            });
        });
    });

    upUsers.forEach((element)=> {
        element.addEventListener('click', function () {
            let idUser = this.getAttribute('data-id');
            let idElement = 'formUser'+idUser;
            let formUserId = document.getElementById(idElement);
            let successUp = document.getElementById('success-up')
            let submitButton = this;
            data = new FormData(formUserId);
            console.log(data, 'изменение данных пользователя');
            this.classList.add('btn_status_loading')
            submitButton.setAttribute('disabled', 'disabled');
            BX.ajax({
                url: '/local/ajax/update_user.php',  //адрес на который передаются данные с формы
                method: 'POST',         //метод передачи данных POST или GET
                dataType: 'html',       //тип передаваемых данных
                data: data,
                processData: false,     //
                preparePost: false,     //предобработка передаваемых данных
                onsuccess: function(data){  //в случаи успеха, выполняем действия
                    console.log(data); //выводим полученные данные в результате успеха.
                    successUp.style.display = 'block';
                    submitButton.classList.remove('btn_status_loading');
                    submitButton.removeAttribute('disabled');
                },
                onfailure: function(){  //действия в случаи ошибки
                    console.log('error') //выводим в результате ошибки, сообщение об ошибки
                }
            });
        });
    });


});