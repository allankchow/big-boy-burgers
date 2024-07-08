document.addEventListener('DOMContentLoaded', function() {
    const incrementBtn = document.querySelector('.custom-quantity-plus');
    const decrementBtn = document.querySelector('.custom-quantity-minus');
    const input = document.querySelector('.custom-quantity-input');
    const woocommerceInput = document.querySelector('input[name="quantity"]');   // Default woocommerce quantity input

    // Adding ARIA labels for accessibility
    if (incrementBtn) {
        incrementBtn.setAttribute('aria-label', 'Increase quantity'); // ARIA label for the increment button
        incrementBtn.addEventListener('click', function() {
            let currentValue = parseInt(input.value);
            if (currentValue < parseInt(input.max)) {
                input.value = currentValue + 1;
                woocommerceInput.value = currentValue + 1; // Update the default woocommerce quantity input with our custom one
                input.dispatchEvent(new Event('change')); // Trigger change event for the productTotalPrice.js -> updateTotal function
            }
        });
    }

    if (decrementBtn) {
        decrementBtn.setAttribute('aria-label', 'Decrease quantity'); // ARIA label for the decrement button
        decrementBtn.addEventListener('click', function() {
            let currentValue = parseInt(input.value);
            if (currentValue > parseInt(input.min)) {
                input.value = currentValue - 1;
                woocommerceInput.value = currentValue - 1; // Update the default woocommerce quantity input with our custom one
                input.dispatchEvent(new Event('change')); // Trigger change event for the productTotalPrice.js -> updateTotal function
            }
        });
    }

    if (input) {
        input.setAttribute('aria-label', 'Quantity'); // ARIA label for the input field
    }
});