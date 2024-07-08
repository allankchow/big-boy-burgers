// Modify the "Add to Cart" submission
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form.cart');
    if (form) {
        form.addEventListener('submit', function(event) {
            if (form.classList.contains('submitting')) {
                event.preventDefault(); // prevent further submissions
            } else {
                form.classList.add('submitting');
            }
        });
    }

    // Add active class to currently selected add-on option
    const radios = document.querySelectorAll('.add-on-radio');
    radios.forEach(radio => {
        radio.addEventListener('click', function() {
            // Get the parent container
            const parentDiv = this.closest('.add-on-option');

            // Check if the radio was already selected
            if (radio.getAttribute('data-previously-checked') === 'true') {
                radio.checked = false;
                radio.setAttribute('data-previously-checked', 'false');
                parentDiv.classList.remove('active');
                // Trigger change event for the productTotalPrice.js -> updateTotal function
                radio.dispatchEvent(new Event('change'));
            } else {
                // Deselect all radios with the same name
                const sameNameRadios = document.querySelectorAll('input[name="' + radio.name + '"]');
                sameNameRadios.forEach(function(input) {
                    input.setAttribute('data-previously-checked', 'false');
                    const parent = input.closest(".add-on-option");
                    parent.classList.remove('active');
                });
                radio.setAttribute('data-previously-checked', 'true');
                parentDiv.classList.add('active');
                // Trigger change event for the productTotalPrice.js -> updateTotal function
                radio.dispatchEvent(new Event('change'));
            }
        });
    });
});
