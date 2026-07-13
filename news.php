<?php
require_once 'includes/functions.php';
$title = 'News';
include 'includes/header.php';
?>

<section class="news-hero" aria-labelledby="news-title">
    <div>
        <p class="eyebrow">News and publications</p>
        <h1 id="news-title">Festival stories, newsletters and project catalogues</h1>
        <p>Follow the programme through daily newsletters and explore the bilingual publications produced around major student projects.</p>
    </div>
    <div class="news-actions">
        <a href="projects.php" class="platform-link primary">Browse projects</a>
        <a href="about.php" class="platform-link">About the festival</a>
    </div>
</section>

<section class="content-section" aria-labelledby="daily-newsletters-title">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Festival newsletters</p>
            <h2 id="daily-newsletters-title">Follow the programme day by day</h2>
        </div>
        <p>Open each issue in the browser or download it for later reading.</p>
    </div>

    <div class="news-grid-modern">
        <?php for ($day = 1; $day <= 4; $day++): ?>
            <?php $file = 'assets/pdfs/Newsletter- DAY ' . $day . '.pdf'; ?>
            <article class="news-document-card">
                <p class="eyebrow">Festival journal</p>
                <h2>Newsletter — Day <?php echo $day; ?></h2>
                <p>Highlights, interviews, activities and project moments from the festival programme.</p>
                <div class="news-document-actions">
                    <a class="platform-link primary" href="<?php echo htmlspecialchars($file); ?>" target="_blank" rel="noopener noreferrer">Open PDF</a>
                    <a class="platform-link" href="<?php echo htmlspecialchars($file); ?>" download>Download</a>
                </div>
            </article>
        <?php endfor; ?>
    </div>
</section>

<section class="content-section" aria-labelledby="catalogues-title">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Project publications</p>
            <h2 id="catalogues-title">Bilingual catalogues</h2>
        </div>
        <p>Romanian and English editions documenting recent interdisciplinary projects.</p>
    </div>

    <div class="news-grid-modern">
        <article class="news-year-card">
            <p class="eyebrow">Ecology · 2026</p>
            <h2>Paradis Educational Apiary</h2>
            <p>Pollination, ecosystems and experiential learning at Tansa.</p>
            <div class="news-document-actions">
                <a class="platform-link primary" href="assets/pdfs/stupina-paradis-2026-ro.pdf">Romanian</a>
                <a class="platform-link" href="assets/pdfs/stupina-paradis-2026-en.pdf">English</a>
            </div>
        </article>

        <article class="news-year-card">
            <p class="eyebrow">Chemistry · 2026</p>
            <h2>Floreal</h2>
            <p>A student project connecting fragrance formulation, product design and presentation.</p>
            <div class="news-document-actions">
                <a class="platform-link primary" href="assets/pdfs/floreal-2026-ro.pdf">Romanian</a>
                <a class="platform-link" href="assets/pdfs/floreal-2026-en.pdf">English</a>
            </div>
        </article>

        <article class="news-year-card">
            <p class="eyebrow">Biology · 2025</p>
            <h2>Paradis Butterfly Farm</h2>
            <p>Observation, habitats, life cycles and biodiversity presented through a practical programme.</p>
            <div class="news-document-actions">
                <a class="platform-link primary" href="assets/pdfs/ferma-de-fluturi-2025-ro.pdf">Romanian</a>
                <a class="platform-link" href="assets/pdfs/ferma-de-fluturi-2025-en.pdf">English</a>
            </div>
        </article>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
