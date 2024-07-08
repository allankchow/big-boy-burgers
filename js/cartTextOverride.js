document.addEventListener('DOMContentLoaded', function() {
    function modifyElements() {
        const couponLink = document.querySelector('.wc-block-components-totals-coupon-link');

        if (couponLink) {
            couponLink.textContent = 'Add Coupon or Gift Card'; 
            couponLink.setAttribute('aria-label', 'Add a coupon or gift card');
            return true; // Element found and modified, no need to observe further
        }
        return false;
    }

    if (!modifyElements()) { // Try to modify immediately, if failed, then observe
        const observer = new MutationObserver(function() {
            if (modifyElements()) {
                observer.disconnect(); // Stop observing once the element is modified
            }
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }
});