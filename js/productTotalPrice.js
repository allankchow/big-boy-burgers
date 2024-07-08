// This function updates the displayed total price of a product
function updateTotal(
    quantityInput,
    addOnRadios,
    priceOutput,
    byoAddOnRadios,
    byoAddOnDropdown,
    byoAddOnCheckboxes
) {
    const quantity = parseInt(quantityInput.value) || 1; // Ensure we have a numeric value if undefined
    const basePrice =
        parseFloat(document.querySelector(".product-base-price").textContent) ||
        0;
    let total = basePrice * quantity; // Start total with base price multiplied by quantity
    const byoTotal = document.querySelector(".wc-pao-subtotal-line .amount"); // subtotal for byo burger

    // Handle regular menu add-ons using radios
    addOnRadios.forEach((radio) => {
        if (radio.checked) {
            const priceText = document.querySelector( `label[for="${radio.id}"] .add-on-price .woocommerce-Price-amount bdi`).textContent;
            const addOnPrice = parseFloat(priceText.substring(1)); // Extract numeric value
            total += addOnPrice * quantity; // Add to total
        }
    });

    // Handle custom burger radios
    byoAddOnRadios.forEach((radio) => {
        if (radio.checked) {
            const radioPrice = parseFloat(radio.dataset.price) || 0; // Extract numeric value from data-price
            total += radioPrice * quantity; // Add to total
        }
    });

    // Handle dropdowns for custom burgers
    byoAddOnDropdown.forEach((dropdown) => {
        const selectedOption = dropdown.options[dropdown.selectedIndex];
        if (selectedOption && selectedOption.dataset.price) {
            const dropdownPrice = parseFloat(selectedOption.dataset.price) || 0; // Extract numeric value from data-price
            total += dropdownPrice * quantity; // Add to total
        }
    });

    // Handle custom burger checkboxes
    byoAddOnCheckboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            const checkboxPrice = parseFloat(checkbox.dataset.price) || 0; // Extract numeric value from data-price
            total += checkboxPrice * quantity; // Add to total
        }
    });

    priceOutput.textContent = `$${total.toFixed(2)}`; // Update the displayed total
    if (byoTotal) {
        byoTotal.textContent = `$${total.toFixed(2)}`; // Update the total of the byo burger element
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const quantityInput = document.querySelector(".custom-quantity-input");
    const addOnRadios = document.querySelectorAll(".add-on-radio");
    const byoAddOnRadios = document.querySelectorAll(".wc-pao-addon-radio");
    const byoAddOnDropdown = document.querySelectorAll(".wc-pao-addon-select");
    const byoAddOnCheckboxes = document.querySelectorAll(".wc-pao-addon-checkbox");
    const priceOutput = document.querySelector(".product-total-price");

    if (byoAddOnRadios.length > 0) {
        byoAddOnRadios[0].checked = true; // Set the first radio button as checked
    }

    // change total price text to say subtotal
    const totalPriceText = document.querySelector(".total-price-container .small-heading");
    if (totalPriceText) {
        totalPriceText.textContent = "Subtotal:";
    }

    // function to update total
    function initUpdate() {
        updateTotal(
            quantityInput,
            addOnRadios,
            priceOutput,
            byoAddOnRadios,
            byoAddOnDropdown,
            byoAddOnCheckboxes
        );
    }

    if (quantityInput) quantityInput.addEventListener("change", initUpdate);
    addOnRadios.forEach((radio) =>
        radio.addEventListener("change", initUpdate)
    );
    byoAddOnRadios.forEach((radio) =>
        radio.addEventListener("change", initUpdate)
    );
    byoAddOnCheckboxes.forEach((checkbox) =>
        checkbox.addEventListener("change", initUpdate)
    );
    byoAddOnDropdown.forEach((dropdown) =>
        dropdown.addEventListener("change", initUpdate)
    );

    initUpdate(); // Initial calculation
});
