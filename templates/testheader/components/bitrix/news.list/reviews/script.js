function showReview(event) {
    const reviewContainer = event.target.closest('[data-entity="review"]');
    reviewContainer.classList.add('reviews-list__item_visible');
}