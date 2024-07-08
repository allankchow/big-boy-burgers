document.addEventListener('DOMContentLoaded', function() {
    let menuToggles = document.querySelectorAll('.footer-links nav button');
    menuToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            let svg = toggle.querySelector('svg');
            let menu = toggle.nextElementSibling.querySelector('ul');
            menu.classList.toggle('open');
            svg.classList.toggle('flipped');
        });
    });
});
