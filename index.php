<?php
// Include core functions and start the session
require_once 'includes/functions.php';

// Set page title for browser tab
$title = 'Home';

// Get recent projects to display on homepage
$recentProjects = getProjects(null, 6); // Get 6 most recent projects

// Get all available years for filtering
$years = getYears();

// Check if user is filtering by a specific year
$selectedYear = isset($_GET['year']) ? $_GET['year'] : null;

// If a year is selected, get only projects from that year
if ($selectedYear) {
    $recentProjects = getProjects($selectedYear, 6);
}

// Include the header (navigation and page setup)
include 'includes/header.php';
?>

<!-- Slideshow section from frontend -->
<section id="home" aria-label="Projects">
  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numberText">1/ 5</div>
      <a href="about.php"><img src="assets/images/PHOTO-2025-10-08-18-57-54.jpg" style="width:100%"></a>
      <div class="text">About Us</div>
    </div>

    <div class="mySlides fade">
      <div class="numberText">2/ 5</div>
      <a href="news.php"><img src="assets/images/PHOTO-2025-10-08-18-51-29.jpg" style="width:100%"></a>
      <div class="text">News</div>
    </div>

    <div class="mySlides fade">
      <div class="numberText">3/ 5</div>
      <a href="projects.php"><img src="assets/images/IMG_5545.jpeg" style="width:100%"></a>
      <div class="text">Projects</div>
    </div>

    <div class="mySlides fade">
      <div class="numberText">4/ 5</div>
      <a href="projects.php"><img src="assets/images/PHOTO-2025-10-08-18-51-39.jpg" style="width:100%"></a>
      <div class="text">Vote</div>
    </div>

    <div class="mySlides fade">
      <div class="numberText">5/ 5</div>
      <a href="community.php"><img src="assets/images/PHOTO-2025-10-08-18-51-46.jpg" style="width:100%"></a>
      <div class="text">STEM Community</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
  </div>

  <!-- Hero section -->
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

  <!-- Image gallery -->
  <div class="row">
    <div class="column">
      <img src="assets/images/IMG_3998.jpg">
      <img src="assets/images/IMG_4051.jpg">
      <img src="assets/images/IMG_4206.jpg">
      <img src="assets/images/IMG_4240.jpg">
      <img src="assets/images/IMG_4381.jpg">
      <img src="assets/images/IMG_4387.jpg">
      <img src="assets/images/IMG_5550.jpeg">
    </div>
    <div class="column">
      <img src="assets/images/IMG_5549.jpeg">
      <img src="assets/images/IMG_5548.jpeg">
      <img src="assets/images/IMG_5545.jpeg">
      <img src="assets/images/NK present.jpg">
      <img src="assets/images/kids.jpg">
      <img src="assets/images/photo school.jpg">
    </div>
    <div class="column">
      <img src="assets/images/PHOTO-2025-10-08-18-51-39.jpg">
      <img src="assets/images/PHOTO-2025-10-08-18-51-46.jpg">
      <img src="assets/images/PHOTO-2025-10-08-18-51-54.jpg">
      <img src="assets/images/PHOTO-2025-10-08-18-52-54.jpg">
      <img src="assets/images/PHOTO-2025-10-08-18-53-15 copy 2.jpg">
      <img src="assets/images/PHOTO-2025-10-08-18-57-54.jpg">
      <img src="assets/images/IMG_4370.jpg">
    </div>
    <div class="column">
      <img src="assets/images/IMG_4072.jpg">
      <img src="assets/images/festival school.jpg">
      <img src="assets/images/IMG_4135.jpg">
      <img src="assets/images/IMG_5546.jpeg">
      <img src="assets/images/PHOTO-2025-10-08-18-51-59.jpg">
      <img src="assets/images/PHOTO-2025-10-12-20-14-06 (1).jpg">
    </div>
  </div>

  <div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <img class="lightbox-content" id="lightbox-img">
    <div id="caption"></div>
  </div>
</section>

<script>
  // Initialize slideshow on page load
  document.addEventListener('DOMContentLoaded', function() {
    currentSlide(1);
  });
</script>

<?php include 'includes/footer.php'; ?>