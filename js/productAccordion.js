// Toggle the accordion on/off
document.addEventListener('DOMContentLoaded', function() {
    const accordionHeaders = document.querySelectorAll('.accordion-button');
    accordionHeaders.forEach(accordion => {
        accordion.addEventListener('click', function() {
            // Get the accordion content
            const accordionContent = accordion.nextElementSibling;
            const container = accordion.closest('.additional-information-container');

            accordionContent.classList.toggle('active');
            accordion.classList.toggle('active');
            container.classList.toggle('active');
        });
    });
});