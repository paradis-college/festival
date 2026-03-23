let slideIndex = 1;

// Next/previous controls
function plusSlides(n) {
  clearTimeout(slideTimeout);
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  clearTimeout(slideTimeout);
  showSlides(slideIndex = n);
}

let slideTimeout;
function showSlides(n) {
  let i;
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
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  
  // Auto advance to next slide after 5 seconds
  slideTimeout = setTimeout(showSlides, 5000);
}

// PDF viewer functionality - fixed implementation
function showPdf() {
    // Fixed to work with unique PDF IDs and show all PDF elements
    const pdfElements = document.querySelectorAll('embed[id^="pdf_"]');
    pdfElements.forEach(element => {
        element.style.display = 'block';
    });
}





/* Hme page image grid click */
const images = document.querySelectorAll('.column img');
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const caption = document.getElementById('caption');
  const closeBtn = document.querySelector('.close');

  images.forEach(img => {
    img.addEventListener('click', () => {
      lightbox.style.display = 'block';
      lightboxImg.src = img.src;
      caption.textContent = img.alt || ''; // dacă vrei, poți adăuga alt text descriptiv
    });
  });

  closeBtn.addEventListener('click', () => {
    lightbox.style.display = 'none';
  });

  // Închide și când se dă click pe fundal sau se apasă Escape
  lightbox.addEventListener('click', e => {
    if (e.target === lightbox) lightbox.style.display = 'none';
  });
  window.addEventListener('keydown', e => {
    if (e.key === 'Escape') lightbox.style.display = 'none';
  });





  /*news pdf try*/
  (function(){
  const modal = document.getElementById('pdfModal');
  if (!modal) return; // Exit if PDF modal doesn't exist on this page
  
  const openers = document.querySelectorAll('.open-pdf');
  const frame   = document.getElementById('pdfFrame');
  const titleEl = document.getElementById('pdfTitle');
  const dlLink  = document.getElementById('pdfDownload');
  const btnX    = modal.querySelector('.pdf-close');
  const btnIn   = document.getElementById('zoomIn');
  const btnOut  = document.getElementById('zoomOut');

  let zoom = 'page-width'; // 'page-fit' / 'page-width' / 100 / 125 / 150 / 200

  function buildSrc(path){
    return `${path}#page=1&zoom=${zoom}&toolbar=1&navpanes=0&scrollbar=1`;
  }
  function openPdf(path, label){
    zoom = 'page-width';
    titleEl.textContent = label || 'Magazine';
    dlLink.href = path;
    frame.src = buildSrc(path);
    modal.classList.add('active');
    modal.setAttribute('aria-hidden','false');
    document.body.style.overflow = 'hidden';
  }
  function closePdf(){
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden','true');
    document.body.style.overflow = '';
    frame.src = '';
  }
  function stepZoom(dir){
    const steps = ['page-fit','page-width',100,125,150,200];
    let i = steps.indexOf(zoom); if(i === -1) i = 1;
    i = Math.max(0, Math.min(steps.length-1, i + dir));
    zoom = steps[i];
    if (dlLink.href) frame.src = buildSrc(dlLink.href);
  }

  openers.forEach(btn => btn.addEventListener('click', () => openPdf(btn.dataset.pdf, btn.dataset.title)));
  btnX.addEventListener('click', closePdf);
  modal.addEventListener('click', e => { if(e.target === modal) closePdf(); });
  window.addEventListener('keydown', e => { if(e.key === 'Escape') closePdf(); });
  btnIn.addEventListener('click', () => stepZoom(+1));
  btnOut.addEventListener('click', () => stepZoom(-1));
})();


// Highlight active page in navbar
document.addEventListener('DOMContentLoaded', function() {
  const currentPage = window.location.pathname.split('/').pop() || 'index.php';
  const navLinks = document.querySelectorAll('#navbar a');
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'index.php')) {
      link.classList.add('active');
    }
  });
  
  // Initialize slideshow
  showSlides();
});
