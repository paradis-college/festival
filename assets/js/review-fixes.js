// Review follow-up fixes for carousel, loading priority and lightbox focus.
(function () {
    function carouselIsPaused() {
        const container = document.querySelector('.slideshow-container');
        if (!container) return false;
        return container.matches(':hover') || container.contains(document.activeElement);
    }

    window.scheduleNextSlide = function scheduleNextSlide() {
        if (typeof window.clearSlideTimer === 'function') window.clearSlideTimer();
        if (!document.hidden && !carouselIsPaused() && document.querySelectorAll('.mySlides').length > 1) {
            window.slideTimeout = window.setTimeout(() => window.showSlides(window.slideIndex + 1), 5000);
        }
    };

    document.addEventListener('DOMContentLoaded', () => {
        const slides = Array.from(document.querySelectorAll('.mySlides'));
        slides.forEach((slide, index) => {
            const image = slide.querySelector('img');
            if (!image) return;
            image.loading = index === 0 ? 'eager' : 'lazy';
            if (index === 0) image.fetchPriority = 'high';
        });

        const lightbox = document.getElementById('lightbox');
        const closeButton = lightbox?.querySelector('.close, .lightbox-close');
        let previouslyFocused = null;

        document.querySelectorAll('.column img').forEach((image) => {
            image.addEventListener('click', () => {
                previouslyFocused = image;
                window.setTimeout(() => closeButton?.focus(), 0);
            });
        });

        const restoreFocus = () => {
            if (previouslyFocused instanceof HTMLElement) previouslyFocused.focus();
            previouslyFocused = null;
        };

        closeButton?.addEventListener('click', restoreFocus);
        lightbox?.addEventListener('click', (event) => {
            if (event.target === lightbox) restoreFocus();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && lightbox?.getAttribute('aria-hidden') === 'false') {
                window.setTimeout(restoreFocus, 0);
            }
        });
    });
})();
