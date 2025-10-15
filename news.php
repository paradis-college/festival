<?php
$title = 'News';
include 'includes/header.php';
?>

<section id="news" class="news">
  <h2>Latest News</h2>
  <p class="news-intro">Stay up to date with the latest from our Nikola Tesla Science Fair Festival — from student breakthroughs to upcoming events and inspiring stories.</p>

  <div class="news-grid">
     <!-- News Item 1 -->
    <article class="news-card">
      <embed id="pdf_test" src="assets/pdfs/Newsletter- DAY 1.pdf" type="application/pdf" onClick="showPdf()" width="100%" height="100%">
    </article>

     <!-- News Item 2 -->
    <article class="news-card">
      <embed id="pdf_test" src="assets/pdfs/Newsletter- DAY 2.pdf" type="application/pdf" onClick="showPdf()" width="100%" height="100%">
    </article>

    <!-- News Item 3-->
    <article class="news-card">
      <embed id="pdf_test" src="assets/pdfs/Newsletter- DAY 3.pdf" type="application/pdf" onClick="showPdf()" width="100%" height="100%">
    </article>

    <!-- News Item 4-->
    <article class="news-card">
      <embed id="pdf_test" src="assets/pdfs/Newsletter- DAY 4.pdf" type="application/pdf" onClick="showPdf()" width="100%" height="100%">
    </article>

    <div class="years-grid">
      <!-- 2022 -->
      <article class="year-card">
        <div class="year-header">
          <div class="year-badge">2022</div>
          <h3>Nikola Tesla Magazine — 2022</h3>
          <p class="year-desc">Rezumatul festivalului: interviuri, proiecte, rezultate & momente cheie.</p>
        </div>
        <div class="year-days">
          <button class="chip open-pdf" data-pdf="assets/pdfs/Newsletter- DAY 1.pdf" data-title="2022 • Day 1">Day 1</button>
          <button class="chip open-pdf" data-pdf="assets/pdfs/Newsletter- DAY 2.pdf" data-title="2022 • Day 2">Day 2</button>
          <button class="chip open-pdf" data-pdf="assets/pdfs/Newsletter- DAY 3.pdf" data-title="2022 • Day 3">Day 3</button>
        </div>
      </article>

      <!-- 2024 -->
      <article class="year-card">
        <div class="year-header">
          <div class="year-badge">2024</div>
          <h3>Nikola Tesla Magazine — 2024</h3>
          <p class="year-desc">Creștere majoră a participării, secțiuni noi și proiecte premiate.</p>
        </div>
        <div class="year-days">
          <button class="chip open-pdf" data-pdf="/pdf/2024/NT-2024-day1.pdf" data-title="2024 • Day 1">Day 1</button>
          <button class="chip open-pdf" data-pdf="/pdf/2024/NT-2024-day2.pdf" data-title="2024 • Day 2">Day 2</button>
        </div>
      </article>

      <!-- 2023 -->
      <article class="year-card">
        <div class="year-header">
          <div class="year-badge">2023</div>
          <h3>Nikola Tesla Magazine — 2023</h3>
          <p class="year-desc">Robotică, energie verde și primele colaborări internaționale.</p>
        </div>
        <div class="year-days">
          <button class="chip open-pdf" data-pdf="/pdf/2023/NT-2023-day1.pdf" data-title="2023 • Day 1">Day 1</button>
          <button class="chip open-pdf" data-pdf="/pdf/2023/NT-2023-day2.pdf" data-title="2023 • Day 2">Day 2</button>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- MODAL PDF VIEWER -->
<div class="pdf-modal" id="pdfModal" aria-hidden="true">
  <div class="pdf-dialog" role="dialog" aria-modal="true" aria-labelledby="pdfTitle">
    <button class="pdf-close" aria-label="Close">×</button>
    <div class="pdf-toolbar">
      <h4 id="pdfTitle">Magazine</h4>
      <div class="pdf-actions">
        <button id="zoomOut" class="btn-ghost" aria-label="Zoom out">−</button>
        <button id="zoomIn" class="btn-ghost" aria-label="Zoom in">+</button>
        <a id="pdfDownload" class="btn-ghost" download>Download</a>
      </div>
    </div>
    <iframe id="pdfFrame" title="PDF viewer"></iframe>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
