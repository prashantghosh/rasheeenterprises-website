document.documentElement.classList.add('js');

// Mobile navigation toggle.
const navToggle = document.querySelector('[data-nav-toggle]');
const nav = document.getElementById('site-nav');

if (navToggle && nav) {
    navToggle.addEventListener('click', () => {
        const open = nav.classList.toggle('is-open');
        navToggle.setAttribute('aria-expanded', String(open));
    });
}

// Dialogs: [data-dialog-open="id"] opens, [data-dialog-close] closes, clicking the backdrop closes.
document.querySelectorAll('[data-dialog-open]').forEach((trigger) => {
    trigger.addEventListener('click', (event) => {
        const dialog = document.getElementById(trigger.dataset.dialogOpen);
        if (dialog?.showModal) {
            event.preventDefault();
            dialog.showModal();
        }
    });
});

document.querySelectorAll('dialog').forEach((dialog) => {
    dialog.addEventListener('click', (event) => {
        if (event.target === dialog) dialog.close();
    });
    dialog.querySelectorAll('[data-dialog-close]').forEach((btn) => {
        btn.addEventListener('click', () => dialog.close());
    });
    if (dialog.hasAttribute('data-open-on-load')) dialog.showModal();
});

// Toast: auto-dismiss after a few seconds, or on close click.
const toast = document.querySelector('[data-toast]');

if (toast) {
    const dismiss = () => {
        toast.classList.add('is-leaving');
        setTimeout(() => toast.remove(), 320);
    };
    toast.querySelector('[data-toast-close]')?.addEventListener('click', dismiss);
    setTimeout(dismiss, 3200);
}

// Catalog filters: re-submit whenever a checkbox, the sort, or the search box (on Enter/blur) changes.
const filters = document.querySelector('[data-filters]');

if (filters) {
    filters.addEventListener('change', () => filters.requestSubmit());
}
