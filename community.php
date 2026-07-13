<?php
require_once 'includes/functions.php';
$title = 'Community';
$extraStylesheets = ['assets/css/secondary-pages.css'];
include 'includes/header.php';
?>

<div class="secondary-page">
    <section class="secondary-hero" aria-labelledby="community-title">
        <div class="secondary-hero-copy">
            <p class="eyebrow">Festival community</p>
            <h1 id="community-title">A shared culture of curiosity, care and collaboration</h1>
            <p class="lead">The festival brings together students, teachers, mentors and families around practical learning and responsible innovation.</p>
        </div>
        <div class="secondary-hero-media">
            <img src="assets/images/PHOTO-2025-10-08-18-51-46.jpg" alt="Students and teachers taking part in a festival activity">
        </div>
    </section>

    <section aria-labelledby="values-title">
        <div class="section-heading">
            <div><p class="eyebrow">Our values</p><h2 id="values-title">How we learn and build together</h2></div>
            <p>These principles guide project work, presentations and collaboration across the festival community.</p>
        </div>

        <div class="values-grid">
            <article class="value-card"><div class="value-icon" aria-hidden="true">?</div><h3>Curiosity</h3><p>We begin with careful observation and questions worth investigating.</p><details><summary>Read more</summary><p>Students are encouraged to test assumptions, compare approaches and treat unexpected results as useful evidence.</p></details></article>
            <article class="value-card"><div class="value-icon" aria-hidden="true">✦</div><h3>Creativity</h3><p>We turn ideas into experiments, models, prototypes and explanations.</p><details><summary>Read more</summary><p>Creative work is supported by iteration, feedback and the freedom to revise an idea when evidence suggests a better direction.</p></details></article>
            <article class="value-card"><div class="value-icon" aria-hidden="true">↔</div><h3>Collaboration</h3><p>Strong projects are built through clear roles, discussion and shared responsibility.</p><details><summary>Read more</summary><p>Students practise listening, explaining decisions and integrating contributions from people with different strengths.</p></details></article>
            <article class="value-card"><div class="value-icon" aria-hidden="true">+</div><h3>Belonging</h3><p>Every learner should have a meaningful way to participate in STEM.</p><details><summary>Read more</summary><p>Activities are designed with multiple entry points so students can contribute through research, building, coding, design or presentation.</p></details></article>
            <article class="value-card"><div class="value-icon" aria-hidden="true">◎</div><h3>Real-world relevance</h3><p>Projects connect classroom knowledge to health, environment, technology and society.</p><details><summary>Read more</summary><p>Students are asked to consider evidence, ethics, sustainability and how clearly they can communicate impact.</p></details></article>
            <article class="value-card"><div class="value-icon" aria-hidden="true">↗</div><h3>Continuous learning</h3><p>Progress comes from reflection, feedback and repeated practice.</p><details><summary>Read more</summary><p>The goal is not only to finish a project, but to understand what changed, what was learned and what should be attempted next.</p></details></article>
        </div>
    </section>

    <section class="secondary-cta" aria-labelledby="community-cta-title">
        <div><h2 id="community-cta-title">Take part in the platform</h2><p>Explore current work and learn how projects become part of the festival archive.</p></div>
        <div class="platform-actions">
            <a href="projects.php" class="platform-link primary">Browse projects</a>
            <?php if (isTeacher() || isAdmin()): ?>
                <a href="upload.php" class="platform-link">Submit a project</a>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
