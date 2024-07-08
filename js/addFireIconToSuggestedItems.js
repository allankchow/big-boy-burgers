document.addEventListener('DOMContentLoaded', function() {
    const suggestedItemsHeading = document.querySelector('.related.products > h2');

    if (suggestedItemsHeading) {
        // New wrapper div which contains the fire icon and SUGGESTED ITEMS heading
        const flexContainer = document.createElement('div');
        flexContainer.classList.add('suggested-items-heading-container');

        // Fire icon image
        const image = document.createElement('img');
        image.src = 'https://bigboyburgers.bcitwebdeveloper.ca/wp-content/uploads/2024/04/c2ce29ffa5e9bed13b899af8e519f551.png';
        image.alt = 'Suggested items icon';

        // Append image and heading to container
        flexContainer.appendChild(image);
        flexContainer.appendChild(suggestedItemsHeading.cloneNode(true));

        // Replace the old heading with the new flex container
        suggestedItemsHeading.parentNode.replaceChild(flexContainer, suggestedItemsHeading);
    }
});
