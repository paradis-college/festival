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

<!-- Hero section - Main banner at top of page -->
<div class="hero-section bg-primary text-white py-5 mb-5 rounded">
    <div class="container text-center">
        <!-- Main heading -->
        <h1 class="display-4 fw-bold mb-4">
            <i class="fas fa-globe-americas me-3"></i>International Science Festival
        </h1>
        <p class="lead mb-4">Discover innovative science projects from students around the world</p>
        
        <!-- Statistics boxes showing project data -->
        <div class="row">
            <!-- Total projects counter -->
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <h3 class="fw-bold"><?php echo count(getProjects()); ?></h3>
                    <p class="mb-0">Total Projects</p>
                </div>
            </div>
            
            <!-- Years covered counter -->
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <h3 class="fw-bold"><?php echo count($years); ?></h3>
                    <p class="mb-0">Years of Innovation</p>
                </div>
            </div>
            
            <!-- Total votes counter -->
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <h3 class="fw-bold">
                        <?php 
                        // Calculate total votes across all projects
                        $totalVotes = 0;
                        foreach(getProjects() as $project) {
                            $totalVotes += $project['vote_count'];
                        }
                        echo $totalVotes;
                        ?>
                    </h3>
                    <p class="mb-0">Community Votes</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Projects heading and year filter -->
<div class="row mb-4 align-items-center">
    <div class="col-md-8">
        <h2 class="mb-0">
            <i class="fas fa-lightbulb me-2 text-success"></i>
            <?php echo $selectedYear ? "Projects from $selectedYear" : "Featured Projects"; ?>
        </h2>
    </div>
    
    <!-- Year filter dropdown on the right -->
    <div class="col-md-4">
        <form method="GET" class="d-flex">
            <select name="year" class="form-select me-2" onchange="this.form.submit()">
                <option value="">All Years</option>
                <?php foreach ($years as $year): ?>
                    <option value="<?php echo $year; ?>" <?php echo $selectedYear == $year ? 'selected' : ''; ?>>
                        <?php echo $year; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
</div>

<!-- Empty state - shown when no projects exist -->
<?php if (empty($recentProjects)): ?>
    <div class="text-center py-5">
        <i class="fas fa-search fa-3x text-muted mb-3"></i>
        <h3 class="text-muted">No projects found</h3>
        <p class="text-muted">
            <?php if ($selectedYear): ?>
                No projects were submitted in <?php echo $selectedYear; ?>.
            <?php else: ?>
                Be the first to upload a project and inspire others!
            <?php endif; ?>
        </p>
        <!-- Show upload button to teachers -->
        <?php if (isTeacher() || isAdmin()): ?>
            <a href="upload.php" class="btn btn-primary mt-3">
                <i class="fas fa-plus me-2"></i>Upload First Project
            </a>
        <?php endif; ?>
    </div>
    
<!-- Projects grid - shows all available projects -->
<?php else: ?>
    <div class="row">
        <?php foreach ($recentProjects as $project): ?>
            <!-- Each project card -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 project-card">
                    <div class="card-body">
                        <!-- Top section: year badge and vote count -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success"><?php echo $project['year']; ?></span>
                            <div class="vote-display">
                                <i class="fas fa-heart"></i>
                                <span class="vote-count"><?php echo $project['vote_count']; ?></span>
                            </div>
                        </div>
                        
                        <!-- Project title (clickable) -->
                        <h5 class="card-title mb-2">
                            <a href="project.php?id=<?php echo $project['id']; ?>" class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($project['title']); ?>
                            </a>
                        </h5>
                        
                        <!-- Author name -->
                        <p class="card-text text-muted small mb-3">
                            <i class="fas fa-user me-1"></i>by <?php echo htmlspecialchars($project['author_name']); ?>
                        </p>
                        
                        <!-- Project description (short version) -->
                        <?php if ($project['description']): ?>
                            <p class="card-text">
                                <?php echo htmlspecialchars(substr($project['description'], 0, 100)); ?>
                                <?php echo strlen($project['description']) > 100 ? '...' : ''; ?>
                            </p>
                        <?php endif; ?>
                        
                        <!-- Bottom section: read more and vote buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                            <a href="project.php?id=<?php echo $project['id']; ?>" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-book-open me-1"></i>Read More
                            </a>
                            
                            <!-- Vote button - only for logged in users -->
                            <?php if (isLoggedIn()): ?>
                                <?php if (hasUserVoted($_SESSION['user_id'], $project['id'])): ?>
                                    <!-- Already voted indicator -->
                                    <small class="text-success">
                                        <i class="fas fa-check-circle"></i> Voted
                                    </small>
                                <?php else: ?>
                                    <!-- Vote form -->
                                    <form method="POST" action="vote.php" class="d-inline">
                                        <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
                                        <button type="submit" class="btn btn-sm vote-btn">
                                            <i class="fas fa-heart me-1"></i>Vote
                                        </button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <!-- View all projects button -->
    <div class="text-center mt-4">
        <a href="projects.php" class="btn btn-primary btn-lg">
            <i class="fas fa-folder-open me-2"></i>View All Projects
        </a>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>