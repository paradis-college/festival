<?php
$title = 'About Us';
include 'includes/header.php';
?>

<section class="about">
  <div class="about-text">
    <h2>About Us</h2>
    <p>
      We are passionate about turning curiosity into creativity.  
      Our mission is to make STEM education inspiring and accessible to everyone — 
      helping young minds explore, experiment, and build a smarter future.
    </p>
    <div class="about-cards">
      <div class="about-card">
        <h3>Our Mission</h3>
        <p>To empower learners through hands-on STEM experiences that spark curiosity and confidence.</p>
      </div>
      <div class="about-card">
        <h3>Our Vision</h3>
        <p>A world where innovation and critical thinking are part of everyday learning.</p>
      </div>
    </div>
    <a href="projects.php" class="about-btn">See Our Students' Work →</a>
    <section id="presentations">
      <h2>Student Projects</h2>
    </section>
  </div>
</section>

<div class="container">
  <img src="assets/images/experiments kids.jpg" alt="Notebook" style="width:100%;">
  <div class="content">
    <h1>Science Fair</h1>
    <p>Inspired by the genius of Nikola Tesla, our Science Fair Festival celebrates the power of imagination, innovation, and discovery. It is where ideas spark into reality, where students transform curiosity into invention, and where the next generation of creators dares to shape the future — just as Tesla did.</p>
  </div>
</div>

<section id="about" class="about section">
  <div class="about-wrap">
    <!-- Tesla Quote -->
    <blockquote class="about-quote">
      "The present is theirs; the future, for which I really worked, is mine."
      <span>— Nikola Tesla</span>
    </blockquote>

    <div class="about-grid">
      <div class="about-feature">
        <div class="about-icon">💡</div>
        <h3>Hands-On Learning</h3>
        <p>Students build real prototypes, run experiments, and learn by doing — not just reading.</p>
      </div>

      <div class="about-feature">
        <div class="about-icon">🤝</div>
        <h3>Collaboration</h3>
        <p>We foster teamwork, mentorship, and peer-to-peer learning in every project.</p>
      </div>

      <div class="about-feature">
        <div class="about-icon">🌍</div>
        <h3>Real-World Impact</h3>
        <p>From sustainability to technology, our projects address challenges that matter.</p>
      </div>

      <div class="about-feature">
        <div class="about-icon">🚀</div>
        <h3>Future-Ready Skills</h3>
        <p>Critical thinking, coding, design — students gain skills for tomorrow's careers.</p>
      </div>
    </div>

    <div class="about-cta">
      <h3>Join the Movement</h3>
      <p>Whether you're a student, teacher, or supporter — there's a place for you in our STEM community.</p>
      <a href="community.php" class="btn btn-primary">Get Involved →</a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
