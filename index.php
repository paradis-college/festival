<?php
require_once 'includes/functions.php';
$title = 'Home';
$recentProjects = getProjects(null, 6);
$years = getYears();
$selectedYear = isset($_GET['year']) ? $_GET['year'] : null;

if ($selectedYear) {
    $recentProjects = getProjects($selectedYear, 6);
}

$festivalVideoPath = 'assets/videos/festival-2025.mp4';
$festivalPosterPath = 'assets/images/festival-video-poster.jpg';
$hasFestivalVideo = file_exists(__DIR__ . '/' . $festivalVideoPath);
$hasFestivalPoster = file_exists(__DIR__ . '/' . $festivalPosterPath);

include 'includes/header.php';
?>

<section id="home" aria-label="Festival highlights">
  <div class="slideshow-container" role="region" aria-label="Featured festival pages" aria-roledescription="carousel">
    <div class="mySlides fade">
      <div class="numberText">1 / 5</div>
      <a href="about.php"><img src="assets/images/PHOTO-2025-10-08-18-57-54.jpg" alt="Students participating in the Nikola Tesla Science Festival"></a>
      <div class="text">About Us</div>
    </div>

    <div class="mySlides fade">
      <div class="numberText">2 / 5</div>
      <a href="news.php"><img src="assets/images/PHOTO-2025-10-08-18-51-29.jpg" alt="Festival news and activities"></a>
      <div class="text">News</div>
    </div>

    <div class="mySlides fade">
      <div class="numberText">3 / 5</div>
      <a href="projects.php"><img src="assets/images/IMG_5545.jpeg" alt="Student science project presentation"></a>
      <div class="text">Projects</div>
    </div>

    <div class="mySlides fade">
      <div class="numberText">4 / 5</div>
      <a href="projects.php"><img src="assets/images/PHOTO-2025-10-08-18-51-39.jpg" alt="Students presenting their work at the festival"></a>
      <div class="text">Vote</div>
    </div>

    <div class="mySlides fade">
      <div class="numberText">5 / 5</div>
      <a href="community.php"><img src="assets/images/PHOTO-2025-10-08-18-51-46.jpg" alt="The Paradis STEM community"></a>
      <div class="text">STEM Community</div>
    </div>

    <button class="prev" type="button" onclick="plusSlides(-1)" aria-label="Previous slide">&#10094;</button>
    <button class="next" type="button" onclick="plusSlides(1)" aria-label="Next slide">&#10095;</button>
  </div>

  <div class="dots-container" aria-label="Choose a slide">
    <button class="dot" type="button" onclick="currentSlide(1)" aria-label="Show slide 1"></button>
    <button class="dot" type="button" onclick="currentSlide(2)" aria-label="Show slide 2"></button>
    <button class="dot" type="button" onclick="currentSlide(3)" aria-label="Show slide 3"></button>
    <button class="dot" type="button" onclick="currentSlide(4)" aria-label="Show slide 4"></button>
    <button class="dot" type="button" onclick="currentSlide(5)" aria-label="Show slide 5"></button>
  </div>

  <section class="festival-video-section" aria-labelledby="festival-video-title">
    <div class="festival-video-copy">
      <p class="section-eyebrow">Festival Highlights</p>
      <h2 id="festival-video-title">Our Festival in a Few Minutes</h2>
      <p>A short look at the experiments, presentations and people behind the Nikola Tesla Science Festival.</p>
    </div>

    <div class="festival-video-frame<?php echo $hasFestivalVideo ? '' : ' is-pending'; ?>">
      <?php if ($hasFestivalVideo): ?>
        <video
          data-festival-video
          controls
          playsinline
          preload="metadata"
          <?php if ($hasFestivalPoster): ?>poster="<?php echo htmlspecialchars($festivalPosterPath); ?>"<?php endif; ?>
        >
          <source src="<?php echo htmlspecialchars($festivalVideoPath); ?>" type="video/mp4">
          Your browser does not support embedded video.
        </video>
      <?php else: ?>
        <div class="festival-video-placeholder" role="status">
          <i class="fas fa-film" aria-hidden="true"></i>
          <p>The festival film is being prepared for web playback.</p>
          <a href="https://drive.google.com/drive/folders/1GPjN-pl3RkTKbhcWnyDPHrFtNZefWaVp" target="_blank" rel="noopener noreferrer">View the source folder</a>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="hero">
    <div class="hero-content">
      <h1>Igniting Innovation Through Curiosity</h1>
      <p>
        Welcome to the <strong>Nikola Tesla Science Fair Festival</strong> —
        where imagination meets invention, and young scientists light the way to a smarter future.
      </p>
      <div class="hero-buttons">
        <a href="about.php" class="hero-btn">Discover Our Story</a>
        <a href="projects.php" class="hero-btn secondary">See Projects</a>
      </div>
    </div>
  </section>

  <div class="row festival-gallery">
    <div class="column">
      <img src="assets/images/IMG_3998.jpg" alt="Festival activity">
      <img src="assets/images/IMG_4051.jpg" alt="Students working on a science project">
      <img src="assets/images/IMG_4206.jpg" alt="Festival experiment">
      <img src="assets/images/IMG_4240.jpg" alt="Student presentation">
      <img src="assets/images/IMG_4381.jpg" alt="Science festival workshop">
      <img src="assets/images/IMG_4387.jpg" alt="Students exploring a project">
      <img src="assets/images/IMG_5550.jpeg" alt="Nikola Tesla Festival moment">
    </div>
    <div class="column">
      <img src="assets/images/IMG_5549.jpeg" alt="Student festival project">
      <img src="assets/images/IMG_5548.jpeg" alt="Festival project display">
      <img src="assets/images/IMG_5545.jpeg" alt="Student project presentation">
      <img src="assets/images/NK present.jpg" alt="Nikola Tesla Festival presentation">
      <img src="assets/images/kids.jpg" alt="Children taking part in the festival">
      <img src="assets/images/photo school.jpg" alt="Paradis International College community">
    </div>
    <div class="column">
      <img src="assets/images/PHOTO-2025-10-08-18-51-39.jpg" alt="Festival participants">
      <img src="assets/images/PHOTO-2025-10-08-18-51-46.jpg" alt="STEM community activity">
      <img src="assets/images/PHOTO-2025-10-08-18-51-54.jpg" alt="Science festival scene">
      <img src="assets/images/PHOTO-2025-10-08-18-52-54.jpg" alt="Students at the festival">
      <img src="assets/images/PHOTO-2025-10-08-18-53-15 copy 2.jpg" alt="Festival group activity">
      <img src="assets/images/PHOTO-2025-10-08-18-57-54.jpg" alt="Nikola Tesla Festival students">
      <img src="assets/images/IMG_4370.jpg" alt="Festival science display">
    </div>
    <div class="column">
      <img src="assets/images/IMG_4072.jpg" alt="Student experiment">
      <img src="assets/images/festival school.jpg" alt="Paradis school festival">
      <img src="assets/images/IMG_4135.jpg" alt="Science project workshop">
      <img src="assets/images/IMG_5546.jpeg" alt="Festival project team">
      <img src="assets/images/PHOTO-2025-10-08-18-51-59.jpg" alt="Students presenting their work">
      <img src="assets/images/PHOTO-2025-10-12-20-14-06 (1).jpg" alt="Festival community photograph">
    </div>
  </div>

  <div id="lightbox" class="lightbox" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Image viewer">
    <button class="close" type="button" aria-label="Close image viewer">&times;</button>
    <img class="lightbox-content" id="lightbox-img" alt="">
    <div id="caption"></div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
