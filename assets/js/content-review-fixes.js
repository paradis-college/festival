// Follow-up fixes from PR review: link hardening and accessible lightbox state.
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('a[target="_blank"]').forEach((link) => {
        const rel = new Set((link.getAttribute('rel') || '').split(/\s+/).filter(Boolean));
        rel.add('noopener');
        rel.add('noreferrer');
        link.setAttribute('rel', Array.from(rel).join(' '));
    });

    const lightbox = document.getElementById('lightbox');
    const closeButton = lightbox?.querySelector('.lightbox-close, .close');
    const galleryImages = document.querySelectorAll('.column img');
    let previouslyFocused = null;

    if (!lightbox) return;

    const openLightboxState = (sourceImage) => {
        previouslyFocused = sourceImage;
        lightbox.setAttribute('aria-hidden', 'false');
        lightbox.setAttribute('role', 'dialog');
        lightbox.setAttribute('aria-modal', 'true');
        window.setTimeout(() => closeButton?.focus(), 0);
    };

    const closeLightboxState = () => {
        lightbox.setAttribute('aria-hidden', 'true');
        if (previouslyFocused instanceof HTMLElement) previouslyFocused.focus();
        previouslyFocused = null;
    };

    galleryImages.forEach((image) => {
        image.addEventListener('click', () => openLightboxState(image));
    });

    closeButton?.addEventListener('click', closeLightboxState);
    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) closeLightboxState();
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && lightbox.getAttribute('aria-hidden') === 'false') {
            closeLightboxState();
        }
    });
});
