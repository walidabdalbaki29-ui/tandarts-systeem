import './bootstrap';

const menuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const openIcon = document.getElementById('menu-open-icon');
const closeIcon = document.getElementById('menu-close-icon');

if (menuButton && mobileMenu && openIcon && closeIcon) {
    menuButton.addEventListener('click', () => {
        const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';

        menuButton.setAttribute('aria-expanded', String(!isExpanded));
        menuButton.setAttribute(
            'aria-label',
            isExpanded ? 'Menu openen' : 'Menu sluiten'
        );

        mobileMenu.classList.toggle('hidden', isExpanded);
        openIcon.classList.toggle('hidden', !isExpanded);
        closeIcon.classList.toggle('hidden', isExpanded);
    });
}

