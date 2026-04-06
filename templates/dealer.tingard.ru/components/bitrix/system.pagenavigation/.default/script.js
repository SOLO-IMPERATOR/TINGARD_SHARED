const ajaxBtnContainer = document.querySelector('.ajax-btn-container');

if (ajaxBtnContainer) {
	ajaxBtnContainer.addEventListener('click', function(event) {

		event.preventDefault();	

		if (event.target.closest('.ajax-btn')) {

			const target = event.target.closest('.ajax-btn');
			target.classList.add('btn_status_loading');
			
			const targetContainer = document.querySelector('.ajax-container');
			const url = target.getAttribute('data-url');

			if (url !== undefined) {

				const xhr = new XMLHttpRequest();
				xhr.open('GET', url, true);
				xhr.responseType = 'document';
				xhr.onload = function() {
					if (xhr.status >= 200 && xhr.status < 400) {

						const data = xhr.response;
						target.remove();

						const elements = data.querySelectorAll('.ajax-item');

						for (let i = 0; i < elements.length; i++) {
							targetContainer.appendChild(elements[i]);
						}

                        if (data.querySelector('.ajax-btn')) {
                            ajaxBtnContainer.appendChild(data.querySelector('.ajax-btn'));
                        } else {
							ajaxBtnContainer.remove();
						}

					} else {
						console.log('server error');
					}
				};
				
				xhr.onerror = function() {
					console.log('error');
				};
				
				xhr.send();

			}
		}

	});
}