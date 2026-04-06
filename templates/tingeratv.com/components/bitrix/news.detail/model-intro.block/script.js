/* const
	modelIntro = document.querySelector('.model-intro'),
	modelStrip = document.querySelector('.model-strip'),
	modelStripeActiveClass = 'model-strip_visible';

const observeIntro = new IntersectionObserver(function(items) {
	if (items[0].intersectionRatio <= 0) {
		modelStrip.classList.add(modelStripeActiveClass);
	} else {
		modelStrip.classList.remove(modelStripeActiveClass);
	};
});

observeIntro.observe(modelIntro); */