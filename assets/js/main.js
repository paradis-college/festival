/**
 * Science Festival - Unified JavaScript
 * Merged from script.js + frontend.js for better performance
 */

// ===== SLIDESHOW FUNCTIONALITY =====
let slideIndex = 1;
let slideTimeout;

function plusSlides(n) {
    clearTimeout(slideTimeout);
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    clearTimeout(slideTimeout);
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    
    if (slides.length === 0) return; // Guard against no slides
    
    if (n === undefined) {
        slideIndex++;
    } else {
        slideIndex = n;
    }
    
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    if (slideIndex < 1) {
        slideIndex = slides.length;
    }
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    
    slides[slideIndex-1].style.display = "block";
    if (dots.length > 0) {
        dots[slideIndex-1].className += " active";
    }
    
    // Auto advance to next slide after 5 seconds
    slideTimeout = setTimeout(showSlides, 5000);
}

// ===== PDF VIEWER FUNCTIONALITY =====
function showPdf() {
    // Fixed to work with unique PDF IDs and show all PDF elements
    const pdfElements = document.querySelectorAll('embed[id^="pdf_"]');
    pdfElements.forEach(element => {
        element.style.display = 'block';
    });
}

// ===== IMAGE GALLERY LIGHTBOX =====
function setupImageGallery() {
    const images = document.querySelectorAll('.column img');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const closeBtn = document.querySelector('.lightbox-close');

    if (!lightbox) return; // Guard if lightbox doesn't exist

    images.forEach(img => {
        img.addEventListener('click', function() {
            lightbox.style.display = 'flex';
            lightboxImg.src = this.src;
            lightboxCaption.textContent = this.alt || 'Image';
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        });
    });

    // Close lightbox
    function closeLightbox() {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeLightbox);
    }

    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Close with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.style.display === 'flex') {
            closeLightbox();
        }
    });
}

// ===== PDF MODAL FUNCTIONALITY =====
function setupPdfModal() {
    const modal = document.getElementById('pdfModal');
    const frame = document.getElementById('pdfFrame');
    const pdfLinks = document.querySelectorAll('.pdf-link');

    if (!modal || !frame) return;

    pdfLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const pdfUrl = this.getAttribute('data-pdf');
            frame.src = pdfUrl;
            const bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        });
    });

    // Clear iframe when modal is closed to stop loading
    modal.addEventListener('hidden.bs.modal', function() {
        frame.src = 'about:blank';
    });
}

// ===== VOTE BUTTON ENHANCEMENT =====
function setupVoteButtons() {
    const voteButtons = document.querySelectorAll('.vote-btn');
    voteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.5);
                border-radius: 50%;
                pointer-events: none;
                animation: ripple 0.6s ease-out;
            `;
            
            button.style.position = 'relative';
            button.style.overflow = 'hidden';
            button.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
}

// ===== FORM VALIDATION ENHANCEMENT =====
function setupFormValidation() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                const firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.focus();
                }
            }
        });
    });
}

// ===== ALERT AUTO-HIDE =====
function setupAlertAutoHide() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        // Only auto-hide success/info alerts, not warnings/errors
        if (alert.classList.contains('alert-success') || alert.classList.contains('alert-info')) {
            setTimeout(() => {
                alert.classList.add('fade');
                setTimeout(() => {
                    alert.remove();
                }, 150);
            }, 5000);
        }
    });
}

// ===== SMOOTH SCROLLING =====
function setupSmoothScrolling() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ===== YOUTUBE URL VALIDATION (for upload/edit forms) =====
function validateYouTubeURL(input) {
    const url = input.value.trim();
    const feedbackDiv = document.getElementById('url-validation-feedback');
    const previewDiv = document.getElementById('video-preview');
    
    if (!feedbackDiv) return; // Guard if elements don't exist
    
    // Clear previous feedback and preview
    feedbackDiv.innerHTML = '';
    if (previewDiv) previewDiv.innerHTML = '';
    
    if (!url) {
        input.classList.remove('is-valid', 'is-invalid');
        return; // Empty is valid
    }
    
    // Enhanced YouTube URL patterns
    const patterns = [
        /(?:youtube\.com|www\.youtube\.com)\/watch\?.*?v=([a-zA-Z0-9_-]{11})/,
        /(?:youtu\.be)\/([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/embed\/([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/shorts\/([a-zA-Z0-9_-]{11})/,
        /(?:m\.youtube\.com)\/watch\?.*?v=([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/live\/([a-zA-Z0-9_-]{11})/
    ];
    
    let videoId = null;
    for (const pattern of patterns) {
        const match = url.match(pattern);
        if (match) {
            videoId = match[1];
            break;
        }
    }
    
    if (videoId) {
        // Valid YouTube URL
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
        feedbackDiv.innerHTML = '<div class="text-success small"><i class="fas fa-check-circle me-1"></i>Valid YouTube URL detected</div>';
        
        // Show preview thumbnail if preview div exists
        if (previewDiv) {
            const thumbnailUrl = `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
            previewDiv.innerHTML = `
                <div class="card">
                    <div class="card-body p-3">
                        <h6 class="card-title mb-2"><i class="fab fa-youtube text-danger me-1"></i>Video Preview</h6>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img src="${thumbnailUrl}" class="img-fluid rounded" alt="Video thumbnail" style="max-height: 90px;">
                            </div>
                            <div class="col-md-8">
                                <small class="text-muted">Video ID: <code>${videoId}</code></small><br>
                                <small class="text-success">✓ This video will be embedded in your project</small>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
    } else {
        // Invalid YouTube URL
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        feedbackDiv.innerHTML = `
            <div class="text-danger small">
                <i class="fas fa-exclamation-triangle me-1"></i>
                Please enter a valid YouTube URL (youtube.com or youtu.be)
            </div>
        `;
    }
}

// ===== INITIALIZATION =====
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functionality
    setupImageGallery();
    setupPdfModal();
    setupVoteButtons();
    setupFormValidation();
    setupAlertAutoHide();
    setupSmoothScrolling();
    
    // Start slideshow if slides exist
    if (document.querySelector('.mySlides')) {
        showSlides(slideIndex);
    }
    
    // Validate existing YouTube URL on edit pages
    const mediaUrlInput = document.getElementById('media_url');
    if (mediaUrlInput && mediaUrlInput.value) {
        validateYouTubeURL(mediaUrlInput);
    }
});

// ===== ADD RIPPLE ANIMATION CSS =====
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        0% {
            transform: scale(0);
            opacity: 1;
        }
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Make functions available globally for HTML onclick handlers
window.showPdf = showPdf;
window.plusSlides = plusSlides;
window.currentSlide = currentSlide;
window.validateYouTubeURL = validateYouTubeURL;