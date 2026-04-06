/* Квиз */
const quizBtn = document.querySelectorAll('[data-entity="open-quiz"]');
const quiz = document.querySelector('[data-entity="quiz"]');
const quizNavigation = document.querySelector('[data-entity="quiz-navigation"]');
const questions = document.querySelectorAll('[data-entity="modal-page"]');
const prevButton = document.querySelector('[data-entity="prev-btn"]');
const nextButton = document.querySelector('[data-entity="next-btn"]');
const progressBar = document.querySelector('[data-entity="progressbar"]');
const progressLabel = document.querySelector('[data-entity="progressbar-percent"]');
const quizThanks = document.querySelector('[data-entity="modal-thanks"]');

quizBtn.forEach(element => {
	element.addEventListener('click', () => {
		quiz.classList.add('modal_active');
	})
});

let currentQuestionIndex = 0;
let progress = 0;
let answers = '';

prevButton.addEventListener('click', () => {
	currentQuestionIndex--;
	showQuestion(currentQuestionIndex);
});

nextButton.addEventListener('click', () => {
	currentQuestionIndex++;
	showQuestion(currentQuestionIndex);
});

questions.forEach((question) => {
	const inputs = question.querySelectorAll('input[type="radio"]');
	inputs.forEach(input => {
		input.addEventListener('change', () => {
			setTimeout(function() {
				nextButton.disabled = false;
				currentQuestionIndex++;
				showQuestion(currentQuestionIndex);
			}, 300);
		});
	});
});

function showQuestion(index) {
	questions.forEach((question, i) => {
	if (i === index) {
		question.classList.add('modal__page_active');
	} else {
		question.classList.remove('modal__page_active');
	}
	});

	prevButton.disabled = index === 0;
	
	nextButton.disabled = true;

	for (const radioButton of document.querySelectorAll('.modal__page_active input[type="radio"]')) {
		if (radioButton.checked) {
			nextButton.disabled = false;
			break;
		}
	}

	progress = (index / questions.length) * 100;
	progressBar.style.width = progress + '%';
	progressLabel.textContent = progress.toFixed(0) + '%';

	if(questions.length === index + 1) {
		quizNavigation.style.display = 'none';
	}

}

quiz.addEventListener('submit', event => {
	event.preventDefault();
	
	const submitBtn = quiz.querySelector('[type="submit"]');

	const lockButton = () => {
		submitBtn.setAttribute('disabled', '');
	}

	const unlockButton = () => {
		submitBtn.removeAttribute('disabled');
	}

	const showThanks = () => {
		document.querySelector('.modal__page_active').style.display = 'none';
		quizThanks.classList.add('modal__thanks_active')

	}

	questions.forEach(item => {
		if(item.dataset.type == 'question') {
			answers = answers + '<b>' + item.querySelector('.modal__title').textContent + '</b><br>' + item.querySelector('input[type="radio"]:checked').value + '<br><br>';
		}
	});

	let data = new FormData(quiz);
	data.append('answers', answers);
	data.append('trace', b24Tracker.guest.getTrace());
	
	lockButton();

	BX.ajax({
		url: '/local/ajax/quiz.tingard.ru.php',
		data: data,
		method: 'POST',
		dataType: 'json',
		timeout: 10,
		processData: false, 
		preparePost: false,
		onsuccess: () => {
			unlockButton();
			showThanks();
			ym(93888072,'reachGoal','thanks');
		},
		onfailure: () => {
			unlockButton();
		}
	});

});

/* Плашка с cookies */
function getCookie(cname) {
	const name = cname + '=';
	const decodedCookie = decodeURIComponent(document.cookie);
	const ca = decodedCookie.split(';');
	for (let i = 0; i < ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return '';
}

function checkCookie() {
	let cookieAccepted = getCookie('cookie_policy');
	if (cookieAccepted == 'accepted') {
		document.querySelector('.cookie-bar').style.display = 'none';
	} else {
		document.querySelector('.cookie-bar').style.display = 'block';
	}
}

checkCookie();



/* phone mask */
document.addEventListener("DOMContentLoaded", function () {
	const phoneInputs = document.querySelectorAll('input[type="tel"]');

	const getInputNumbersValue = function (input) {
		// Return stripped input value — just numbers
		return input.value.replace(/\D/g, '');
	}

	const onPhonePaste = function (e) {
		var input = e.target,
			inputNumbersValue = getInputNumbersValue(input);
		var pasted = e.clipboardData || window.clipboardData;
		if (pasted) {
			var pastedText = pasted.getData('Text');
			if (/\D/g.test(pastedText)) {
				// Attempt to paste non-numeric symbol — remove all non-numeric symbols,
				// formatting will be in onPhoneInput handler
				input.value = inputNumbersValue;
				return;
			}
		}
	}

	const onPhoneInput = function (e) {
		var input = e.target,
			inputNumbersValue = getInputNumbersValue(input),
			selectionStart = input.selectionStart,
			formattedInputValue = "";

		if (!inputNumbersValue) {
			return input.value = "";
		}

		if (input.value.length != selectionStart) {
			// Editing in the middle of input, not last symbol
			if (e.data && /\D/g.test(e.data)) {
				// Attempt to input non-numeric symbol
				input.value = inputNumbersValue;
			}
			return;
		}

		if (["7", "8", "9"].indexOf(inputNumbersValue[0]) > -1) {
			if (inputNumbersValue[0] == "9") inputNumbersValue = "7" + inputNumbersValue;
			var firstSymbols = (inputNumbersValue[0] == "8") ? "8" : "+7";
			formattedInputValue = input.value = firstSymbols + " ";
			if (inputNumbersValue.length > 1) {
				formattedInputValue += '(' + inputNumbersValue.substring(1, 4);
			}
			if (inputNumbersValue.length >= 5) {
				formattedInputValue += ') ' + inputNumbersValue.substring(4, 7);
			}
			if (inputNumbersValue.length >= 8) {
				formattedInputValue += '-' + inputNumbersValue.substring(7, 9);
			}
			if (inputNumbersValue.length >= 10) {
				formattedInputValue += '-' + inputNumbersValue.substring(9, 11);
			}
		} else {
			formattedInputValue = '+' + inputNumbersValue.substring(0, 16);
		}
		input.value = formattedInputValue;
	}
	const onPhoneKeyDown = function (e) {
		// Clear input after remove last symbol
		var inputValue = e.target.value.replace(/\D/g, '');
		if (e.keyCode == 8 && inputValue.length == 1) {
			e.target.value = "";
		}
	}
	for (var phoneInput of phoneInputs) {
		phoneInput.addEventListener('keydown', onPhoneKeyDown);
		phoneInput.addEventListener('input', onPhoneInput, false);
		phoneInput.addEventListener('paste', onPhonePaste, false);
	}
})
