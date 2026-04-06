document.addEventListener('DOMContentLoaded', () => {

	class Tabs { // объявляем JavaScript класс Tabs
		constructor(config) { // специальный метод constructor принимает объект со значениями CSS классов и селекторов
		this.tabs = config.tabsSelector // записываем в экземпляр JavaScript класса переданный селектор основного элемента вкладок
		this.head = config.tabsHeadSelector // записываем в экземпляр JavaScript класса переданный селектор элемента c кнопками
		this.body = config.tabsBodySelector // записываем в экземпляр JavaScript класса переданный селектор элемента c контентом
		this.caption = config.tabsCaptionSelector // записываем в экземпляр JavaScript класса переданный селектор элемента кнопки
		this.captionActiveClass = config.tabsCaptionActiveClass // записываем в экземпляр JavaScript класса переданный активный CSS класс элемента кнопки
		this.contentActiveClass = config.tabsContentActiveClass // записываем в экземпляр JavaScript класса переданный активный CSS класс элемента контента
		}
		

		getActiveTabName(head) { // метод для получения названия активной вкладки
		return head.querySelector(`.${this.captionActiveClass}`).dataset.tab // возвращаем значение data-tab активной кнопки
		}

		setActiveContent(head, body) { // метод для установки активного элемента контента
		if (body.querySelector(`.${this.contentActiveClass}`)) { // если уже есть активный элемент контента
			body.querySelector(`.${this.contentActiveClass}`).classList.remove(this.contentActiveClass) // то скрываем его
		}
		body.querySelector(`[data-tab=${this.getActiveTabName(head)}]`).classList.add(this.contentActiveClass) // затем ищем элемент контента, у которого значение data-tab совпадает со значением data-tab активной кнопки и отображаем его
		}

		onLoad(head, body) { // метод для описания логики при загрузке страницы
		// проверяем при загрузке страницы, есть ли активная вкладка
		if (!head.querySelector(`.${this.captionActiveClass}`)) { // если активной вкладки нет
			head.querySelector(this.caption).classList.add(this.captionActiveClass) // то делаем активной по-умолчанию первую вкладку
		}

		this.setActiveContent(head, body) // устанавливаем активный элемент контента в соответствии с активной кнопкой при загрузке страницы
		}

		onClick(head, body) { // метод для описания логики при клике на элемент с кнопками
		head.addEventListener('click', e => { // при клике на элемент с кнопками
			const caption = e.target.closest(this.caption) // узнаем, был ли клик на кнопке
			if (!caption) return // если клик был не на кнопке, то прерываем выполнение метода
			if (caption.classList.contains(this.captionActiveClass)) return // если клик был на активной кнопке, то тоже прерываем выполнение метода и ничего не делаем

			if (head.querySelector(`.${this.captionActiveClass}`)) { // если уже есть активная кнопка
			head.querySelector(`.${this.captionActiveClass}`).classList.remove(this.captionActiveClass) // то удаляем ей активный класс
			}

			caption.classList.add(this.captionActiveClass) // затем добавляем активный класс кнопке, на которой был клик

			this.setActiveContent(head, body) // устанавливаем активный элемент контента в соответствии с активной кнопкой
		})
		}

		init() { // основной метод для вызова других описанных методов
		const tabs = document.querySelector(this.tabs) // ищем на странице элемент по переданному селектору основного элемента вкладок и записываем в константу
		const head = tabs.querySelector(this.head) // ищем в элементе tabs элемент с кнопками по переданному селектору и записываем в константу
		const body = tabs.querySelector(this.body) // ищем в элементе tabs элемент с контентом по переданному селектору и записываем в константу

		this.onLoad(head, body) // вызываем метод onLoad и передаем в параметрах константы, объявленные выше

		this.onClick(head, body) // вызываем метод onClick и передаем в параметрах константы, объявленные выше
		}
	}

	if(document.querySelector('.catalog-detail__tabs')) {
		new Tabs({ // создаем экземпляр JavaScript класса Tabs, и передаем значения CSS классов и селекторов элемента вкладок, которые нужно оживить - section__tabs
		tabsSelector: '.catalog-detail__tabs', // основной элемент вкладок
		tabsHeadSelector: '.tabs__head', // элемент с кнопками
		tabsBodySelector: '.tabs__body', // элемент с контентом
		tabsCaptionSelector: '.tabs__caption', // элемент кнопки
		tabsCaptionActiveClass: 'tabs__caption_active', // активный класс кнопки
		tabsContentActiveClass: 'tabs__content_active', // активный класс элемента контента
		}).init() // вызываем основной метод init
	}
	if(document.querySelector('.sidebar-news__tabs')) {
		new Tabs({
			tabsSelector: '.sidebar-news__tabs',
			tabsHeadSelector: '.tabs__head',
			tabsBodySelector: '.tabs__body',
			tabsCaptionSelector: '.tabs__caption',
			tabsCaptionActiveClass: 'tabs__caption_active',
			tabsContentActiveClass: 'tabs__content_active',
		}).init()
	}
	if(document.querySelector('.about-sections__tabs')) {
		new Tabs({
			tabsSelector: '.about-sections__tabs',
			tabsHeadSelector: '.tabs__head',
			tabsBodySelector: '.tabs__body',
			tabsCaptionSelector: '.tabs__caption',
			tabsCaptionActiveClass: 'tabs__caption_active',
			tabsContentActiveClass: 'tabs__content_active',
		}).init()
	}

})
