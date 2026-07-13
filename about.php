<?php
require_once 'includes/functions.php';
$title = 'About Us';
include 'includes/header.php';
?>

<link href="assets/css/secondary-pages.css" rel="stylesheet">

<div class="secondary-page">
    <section class="secondary-hero" aria-labelledby="about-title">
        <div class="secondary-hero-copy">
            <p class="eyebrow">About the festival</p>
            <h1 id="about-title">Where student curiosity becomes visible work</h1>
            <p class="lead">Paradis Science Festival is a public showcase, project platform and archive for student-led science, engineering and interdisciplinary learning.</p>
        </div>
        <div class="secondary-hero-media">
            <img src="assets/images/experiments kids.jpg" alt="Students conducting science experiments">
        </div>
    </section>

    <section aria-labelledby="purpose-title">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Purpose</p>
                <h2 id="purpose-title">More than a one-day exhibition</h2>
            </div>
            <p>The festival gives students a place to investigate, build, present and revisit their work over time.</p>
        </div>
        <div class="secondary-grid">
            <article class="secondary-card">
                <h3>Learn through making</h3>
                <p>Students test ideas through experiments, prototypes, observation, research and iteration.</p>
            </article>
            <article class="secondary-card">
                <h3>Present with confidence</h3>
                <p>Projects are explained to peers, teachers, families and external guests in a public setting.</p>
            </article>
            <article class="secondary-card">
                <h3>Connect disciplines</h3>
                <p>Science, engineering, design, ecology, chemistry and digital tools meet in practical work.</p>
            </article>
            <article class="secondary-card">
                <h3>Build an archive</h3>
                <p>Projects, publications, media and results remain available beyond the event itself.</p>
            </article>
        </div>
    </section>

    <section class="secondary-grid" aria-label="Mission and vision">
        <article class="secondary-card">
            <p class="eyebrow">Mission</p>
            <h2>Make STEM active and accessible</h2>
            <p>We create structured opportunities for students to ask better questions, develop practical skills and communicate what they discover.</p>
        </article>
        <article class="secondary-card">
            <p class="eyebrow">Vision</p>
            <h2>A school culture where ideas are built</h2>
            <p>We want experimentation, collaboration and responsible innovation to become normal parts of everyday learning.</p>
        </article>
    </section>

    <section class="secondary-cta" aria-labelledby="about-cta-title">
        <div>
            <h2 id="about-cta-title">See what students have created</h2>
            <p>Browse current projects, project films and bilingual publications.</p>
        </div>
        <a href="projects.php" class="platform-link primary">Browse projects</a>
    </section>
</div>

<?php include 'includes/footer.php'; ?>