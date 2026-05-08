import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import persist from '@alpinejs/persist';

window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.plugin(persist);

Alpine.start();

// Livewire notification handling
window.addEventListener('notify', event => {
    const notification = event.detail;
    // You can integrate with a toast library here
    console.log('Notification:', notification);
});

// Theme persistence
if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

// Session timeout warning
let sessionTimeout;
const SESSION_WARNING_TIME = 60000; // 1 minute before session expires

function resetSessionTimeout() {
    clearTimeout(sessionTimeout);
    sessionTimeout = setTimeout(() => {
        // Show session expiry warning
        if (confirm('Your session will expire soon. Do you want to stay logged in?')) {
            // Refresh session via AJAX
            fetch('/refresh-session');
            resetSessionTimeout();
        }
    }, SESSION_WARNING_TIME);
}

// Reset timeout on user activity
document.addEventListener('mousemove', resetSessionTimeout);
document.addEventListener('keypress', resetSessionTimeout);
resetSessionTimeout();