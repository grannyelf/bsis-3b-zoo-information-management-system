import './bootstrap';

import 'preline'

const initPreline = () => {
    if (window.HSStaticMethods) {
        window.HSStaticMethods.autoInit();
    }
};

// Initial page load
window.addEventListener('load', initPreline);

// Livewire v3/v4 navigation fix
document.addEventListener('livewire:navigated', () => {
    setTimeout(initPreline, 0);
});