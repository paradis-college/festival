// Follow-up fixes from PR review and preview-specific positioning.
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('a[target="_blank"]').forEach((link) => {
        const rel = new Set((link.getAttribute('rel') || '').split(/\s+/).filter(Boolean));
        rel.add('noopener');
        rel.add('noreferrer');
        link.setAttribute('rel', Array.from(rel).join(' '));
    });

    // Correct project name everywhere it appears.
    document.querySelectorAll('body *').forEach((element) => {
        if (element.children.length === 0 && element.textContent.includes('WARD robot')) {
            element.textContent = element.textContent.replaceAll('WARD robot', 'WARDA robot');
        }
    });

    // Present the shorter institutional title consistently.
    document.title = document.title.replace('Nikola Tesla Science Festival', 'Paradis Science Festival');
    document.querySelectorAll('.brand-label').forEach((element) => {
        element.textContent = 'Paradis Science Festival';
    });
    document.querySelectorAll('.site-header .logo').forEach((element) => {
        element.innerHTML = 'Paradis <span>Science Festival</span>';
    });

    const isStaticPreview = window.location.pathname.startsWith('/preview') || document.body.classList.contains('static-preview');

    if (isStaticPreview) {
        // Vercel cannot execute PHP. Keep preview navigation entirely static.
        document.querySelectorAll('a[href="/projects.php"]').forEach((link) => {
            link.setAttribute('href', '/preview/projects.html');
        });
        document.querySelectorAll('a[href="/upload.php"]').forEach((link) => {
            link.setAttribute('href', '/preview/submit.html');
        });

        // Achievements must remain the first homepage content block.
        const achievements = document.getElementById('achievements');
        const platformIntro = document.querySelector('.platform-intro');
        if (achievements && platformIntro) {
            achievements.insertAdjacentElement('afterend', platformIntro);
        }

        // Use the compressed local catalogues uploaded to the branch.
        const localPdfMap = {
            '1a5D0Hl6_nLnOlBmnmKuXNQaTv-9lNr_v': '/assets/pdfs/stupina-paradis-2026-ro.pdf',
            '1TSbLFIomSwyx25xgyD7SSfchvwsKMwfY': '/assets/pdfs/stupina-paradis-2026-en.pdf',
            '1TllCy7DV8o1AtsZ0QLjO_4HwkXftR2Uk': '/assets/pdfs/floreal-2026-ro.pdf',
            '1_3L4jV5I9OWL0-oyyvwPhnrfHadwyqeA': '/assets/pdfs/floreal-2026-en.pdf',
            '1AqRe3VyCl9McsoCWodtrfqo8gCPjTkAL': '/assets/pdfs/ferma-de-fluturi-2025-ro.pdf',
            '1ppM-2gQ9nOgjsh8aF2vJk6WPERyr6N8j': '/assets/pdfs/ferma-de-fluturi-2025-en.pdf'
        };
        document.querySelectorAll('a[href*="drive.google.com/file/d/"]').forEach((link) => {
            const match = Object.entries(localPdfMap).find(([id]) => link.href.includes(id));
            if (match) {
                link.href = match[1];
                link.removeAttribute('target');
            }
        });
    }

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