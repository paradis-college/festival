/**
 * Science Festival - Unified JavaScript
 */

// ===== ROBUST SLIDESHOW =====
let slideIndex = 1;
let slideTimeout = null;
const SLIDE_DELAY = 5000;

function getSlides() {
    return Array.from(document.querySelectorAll('.mySlides'));
}

function getDots() {
    return Array.from(document.querySelectorAll('.dot'));
}

function clearSlideTimer() {
    if (slideTimeout !== null) {
        window.clearTimeout(slideTimeout);
        slideTimeout = null;
    }
}

function scheduleNextSlide() {
    clearSlideTimer();
    if (!document.hidden && getSlides().length > 1) {
        slideTimeout = window.setTimeout(() => showSlides(slideIndex + 1), SLIDE_DELAY);
    }
}

function renderSlide() {
    const slides = getSlides();
    const dots = getDots();

    if (!slides.length) return;

    if (slideIndex > slides.length) slideIndex = 1;
    if (slideIndex < 1) slideIndex = slides.length;

    slides.forEach((slide, index) => {
        const active = index === slideIndex - 1;
        slide.hidden = !active;
        slide.classList.toggle('is-active', active);
        slide.setAttribute('aria-hidden', active ? 'false' : 'true');
    });

    dots.forEach((dot, index) => {
        const active = index === slideIndex - 1;
        dot.classList.toggle('active', active);
        dot.setAttribute('aria-current', active ? 'true' : 'false');
    });

    scheduleNextSlide();
}

function showSlides(n) {
    if (Number.isFinite(n)) slideIndex = n;
    renderSlide();
}

function plusSlides(n) {
    clearSlideTimer();
    showSlides(slideIndex + n);
}

function currentSlide(n) {
    clearSlideTimer();
    showSlides(n);
}

function setupSlideshow() {
    const container = document.querySelector('.slideshow-container');
    const slides = getSlides();

    if (!container || !slides.length) return;

    slides.forEach((slide) => {
        const image = slide.querySelector('img');
        if (!image) return;

        image.loading = 'eager';
        image.decoding = 'async';

        image.addEventListener('error', () => {
            slide.classList.add('slide-load-error');
            const fallback = document.createElement('div');
            fallback.className = 'slide-fallback';
            fallback.textContent = 'Festival image unavailable';
            image.replaceWith(fallback);
        }, { once: true });
    });

    container.addEventListener('mouseenter', clearSlideTimer);
    container.addEventListener('mouseleave', scheduleNextSlide);
    container.addEventListener('focusin', clearSlideTimer);
    container.addEventListener('focusout', scheduleNextSlide);

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) clearSlideTimer();
        else scheduleNextSlide();
    });

    renderSlide();
}

// ===== LOCAL VIDEO =====
function setupFestivalVideo() {
    const video = document.querySelector('[data-festival-video]');
    if (!video) return;

    video.addEventListener('error', () => {
        const wrapper = video.closest('.festival-video-frame');
        if (wrapper) wrapper.classList.add('video-load-error');
    });

    video.addEventListener('play', clearSlideTimer);
    video.addEventListener('pause', scheduleNextSlide);
    video.addEventListener('ended', scheduleNextSlide);
}

// ===== PDF VIEWER =====
function showPdf() {
    document.querySelectorAll('embed[id^="pdf_"]').forEach((element) => {
        element.style.display = 'block';
    });
}

// ===== IMAGE GALLERY LIGHTBOX =====
function setupImageGallery() {
    const images = document.querySelectorAll('.column img');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('caption');
    const closeBtn = lightbox ? lightbox.querySelector('.close, .lightbox-close') : null;

    if (!lightbox || !lightboxImg) return;

    function closeLightbox() {
        lightbox.style.display = 'none';
        lightbox.setAttribute('aria-hidden', 'true');
        lightboxImg.removeAttribute('src');
        document.body.style.overflow = '';
    }

    images.forEach((img) => {
        img.tabIndex = 0;
        img.setAttribute('role', 'button');
        img.addEventListener('click', () => {
            lightbox.style.display = 'flex';
            lightbox.setAttribute('aria-hidden', 'false');
            lightboxImg.src = img.currentSrc || img.src;
            lightboxImg.alt = img.alt || 'Festival photograph';
            if (lightboxCaption) lightboxCaption.textContent = img.alt || '';
            document.body.style.overflow = 'hidden';
        });
        img.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                img.click();
            }
        });
    });

    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) closeLightbox();
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && lightbox.style.display === 'flex') closeLightbox();
    });
}

// ===== PDF MODAL =====
function setupPdfModal() {
    const modal = document.getElementById('pdfModal');
    const frame = document.getElementById('pdfFrame');
    if (!modal || !frame) return;

    document.querySelectorAll('.pdf-link').forEach((link) => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            frame.src = link.getAttribute('data-pdf');
            if (window.bootstrap?.Modal) new bootstrap.Modal(modal).show();
        });
    });

    modal.addEventListener('hidden.bs.modal', () => {
        frame.src = 'about:blank';
    });
}

// ===== FORM AND UI ENHANCEMENTS =====
function setupVoteButtons() {
    document.querySelectorAll('.vote-btn').forEach((button) => {
        button.addEventListener('click', (event) => {
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.className = 'button-ripple';
            ripple.style.width = `${size}px`;
            ripple.style.height = `${size}px`;
            ripple.style.left = `${event.clientX - rect.left - size / 2}px`;
            ripple.style.top = `${event.clientY - rect.top - size / 2}px`;
            button.appendChild(ripple);
            window.setTimeout(() => ripple.remove(), 600);
        });
    });
}

function setupFormValidation() {
    document.querySelectorAll('form').forEach((form) => {
        form.addEventListener('submit', (event) => {
            let valid = true;
            form.querySelectorAll('[required]').forEach((field) => {
                const empty = !String(field.value ?? '').trim();
                field.classList.toggle('is-invalid', empty);
                if (empty) valid = false;
            });
            if (!valid) {
                event.preventDefault();
                form.querySelector('.is-invalid')?.focus();
            }
        });
    });
}

function setupAlertAutoHide() {
    document.querySelectorAll('.alert-success, .alert-info').forEach((alert) => {
        window.setTimeout(() => alert.remove(), 5000);
    });
}

function setupSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const selector = link.getAttribute('href');
            if (!selector || selector === '#') return;
            const target = document.querySelector(selector);
            if (target) {
                event.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
}

// ===== YOUTUBE URL VALIDATION =====
function validateYouTubeURL(input) {
    const url = input.value.trim();
    const feedbackDiv = document.getElementById('url-validation-feedback');
    const previewDiv = document.getElementById('video-preview');
    if (!feedbackDiv) return;

    feedbackDiv.innerHTML = '';
    if (previewDiv) previewDiv.innerHTML = '';

    if (!url) {
        input.classList.remove('is-valid', 'is-invalid');
        return;
    }

    const patterns = [
        /(?:youtube\.com|www\.youtube\.com)\/watch\?.*?v=([a-zA-Z0-9_-]{11})/,
        /(?:youtu\.be)\/([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/embed\/([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/shorts\/([a-zA-Z0-9_-]{11})/,
        /(?:m\.youtube\.com)\/watch\?.*?v=([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/live\/([a-zA-Z0-9_-]{11})/
    ];

    const match = patterns.map((pattern) => url.match(pattern)).find(Boolean);
    const videoId = match?.[1] || null;

    input.classList.toggle('is-valid', Boolean(videoId));
    input.classList.toggle('is-invalid', !videoId);

    if (videoId) {
        feedbackDiv.innerHTML = '<div class="text-success small"><i class="fas fa-check-circle me-1"></i>Valid YouTube URL detected</div>';
        if (previewDiv) {
            previewDiv.innerHTML = `<div class="card"><div class="card-body p-3"><h6 class="card-title mb-2"><i class="fab fa-youtube text-danger me-1"></i>Video Preview</h6><img src="https://img.youtube.com/vi/${videoId}/hqdefault.jpg" class="img-fluid rounded" alt="Video thumbnail" style="max-height:90px"><div><small class="text-muted">Video ID: <code>${videoId}</code></small></div></div></div>`;
        }
    } else {
        feedbackDiv.innerHTML = '<div class="text-danger small"><i class="fas fa-exclamation-triangle me-1"></i>Please enter a valid YouTube URL.</div>';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    setupSlideshow();
    setupFestivalVideo();
    setupImageGallery();
    setupPdfModal();
    setupVoteButtons();
    setupFormValidation();
    setupAlertAutoHide();
    setupSmoothScrolling();

    const mediaUrlInput = document.getElementById('media_url');
    if (mediaUrlInput?.value) validateYouTubeURL(mediaUrlInput);
});

window.showPdf = showPdf;
window.plusSlides = plusSlides;
window.currentSlide = currentSlide;
window.validateYouTubeURL = validateYouTubeURL;
