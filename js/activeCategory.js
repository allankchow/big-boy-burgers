document.addEventListener('DOMContentLoaded', function() {
    setActiveCategoryClass();
    // Listen to custom event or set a timeout after typical AJAX operations
    jQuery(document.body).on('added_to_cart', setActiveCategoryClass);
});

function setActiveCategoryClass() {
    // Strip query parameters from the current URL
    const currentUrl = window.location.href.split('?')[0];
    const links = document.querySelectorAll('.product-categories-tabs a.category-link');

    links.forEach(link => {
        if (link.href.split('?')[0] === currentUrl) {
            link.classList.add('active-category');
        } 
    });
}
