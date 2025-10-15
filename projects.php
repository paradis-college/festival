<?php
// Include core functions and handle project filtering
require_once 'includes/functions.php';

// Get filter options from URL
$year = isset($_GET['year']) ? $_GET['year'] : null;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'votes';

// Get projects (optionally filtered by year)
$projects = getProjects($year);

// Sort projects based on user selection
if ($sort === 'date') {
    // Sort by most recent first
    usort($projects, function($a, $b) {
        return strtotime($b['created_at']) - strtotime($a['created_at']);
    });
} elseif ($sort === 'title') {
    // Sort alphabetically by title
    usort($projects, function($a, $b) {
        return strcmp($a['title'], $b['title']);
    });
}
// Default is by votes (already sorted in getProjects)

// Get all available years for filter dropdown
$years = getYears();

// Set page title
$title = 'All Projects';
include 'includes/header.php';
?>

<div class="pres-hero">
  <h2>Student Presentations</h2>
  <p class="pres-intro">
    A stage for bold ideas and real-world problem solving — From a single idea to a working prototype — our students prove that science is an adventure, not a formula.
    Here, experiments turn into breakthroughs, and passion turns into purpose.
  </p>

  <div class="pres-cta">
    <?php if (isTeacher() || isAdmin()): ?>
      <a href="upload.php" class="btn">Submit Your Project →</a>
    <?php endif; ?>
    <a href="news.php" class="btn secondary">Get Updates →</a>
  </div>

  <!-- Filter controls -->
  <div class="pres-filters">
    <form method="GET" style="display: inline;">
      <select name="year" class="chip" onchange="this.form.submit()" style="appearance: auto; cursor: pointer;">
        <option value="">All Years</option>
        <?php foreach ($years as $yearOption): ?>
          <option value="<?php echo $yearOption; ?>" <?php echo $year == $yearOption ? 'selected' : ''; ?>>
            <?php echo $yearOption; ?>
          </option>
        <?php endforeach; ?>
      </select>
      <input type="hidden" name="sort" value="<?php echo htmlspecialchars($sort); ?>">
    </form>
    
    <form method="GET" style="display: inline; margin-left: 10px;">
      <select name="sort" class="chip" onchange="this.form.submit()" style="appearance: auto; cursor: pointer;">
        <option value="votes" <?php echo $sort === 'votes' ? 'selected' : ''; ?>>By Votes</option>
        <option value="date" <?php echo $sort === 'date' ? 'selected' : ''; ?>>By Date</option>
        <option value="title" <?php echo $sort === 'title' ? 'selected' : ''; ?>>By Title</option>
      </select>
      <input type="hidden" name="year" value="<?php echo htmlspecialchars($year); ?>">
    </form>
  </div>
</div>

<!-- Projects grid -->
<?php if (empty($projects)): ?>
  <div class="pres-grid">
    <article class="pres-card skeleton">
      <div class="thumb skeleton-box"></div>
      <div class="meta">
        <h3 class="title skeleton-line">No projects yet</h3>
        <p class="desc skeleton-line">
          <?php if ($year): ?>
            No projects were submitted in <?php echo $year; ?>.
          <?php else: ?>
            Be the first to upload a project!
          <?php endif; ?>
        </p>
        <span class="badge">Coming soon</span>
      </div>
    </article>
  </div>
<?php else: ?>
  <div class="pres-grid">
    <?php foreach ($projects as $project): ?>
      <article class="pres-card">
        <a href="project.php?id=<?php echo $project['id']; ?>" style="text-decoration: none; color: inherit;">
          <div class="thumb" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
            🔬
          </div>
          <div class="meta">
            <h3 class="title"><?php echo htmlspecialchars($project['title']); ?></h3>
            <p class="desc">
              <?php 
                if ($project['description']) {
                  echo htmlspecialchars(substr($project['description'], 0, 100)); 
                  echo strlen($project['description']) > 100 ? '...' : '';
                } else {
                  echo 'View project details';
                }
              ?>
            </p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <span class="badge"><?php echo $project['year']; ?></span>
              <span class="badge" style="background: #ef4444;">
                <i class="fas fa-heart"></i> <?php echo $project['vote_count']; ?>
              </span>
            </div>
            <p style="color: var(--muted); font-size: 0.9rem; margin-top: 8px;">
              by <?php echo htmlspecialchars($project['author_name']); ?>
            </p>
          </div>
        </a>
      </article>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<p class="pres-note">
  <?php if (isTeacher() || isAdmin()): ?>
    Submissions are open. <a href="upload.php">Upload your project</a> and share your innovation!
  <?php else: ?>
    Want to see your project featured here? Contact a teacher to submit your work.
  <?php endif; ?>
</p>

<?php include 'includes/footer.php'; ?>