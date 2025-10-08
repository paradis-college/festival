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

<!-- Page header with title and upload button -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>
        <i class="fas fa-folder-open me-2 text-info"></i>All Projects
    </h2>
    <!-- Only teachers and admins see upload button -->
    <?php if (isTeacher() || isAdmin()): ?>
        <a href="upload.php" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Upload Project
        </a>
    <?php endif; ?>
</div>

<!-- Filter and sort options -->
<div class="row mb-4">
    <!-- Year filter on the left -->
    <div class="col-md-6 mb-3 mb-md-0">
        <form method="GET" class="d-flex">
            <label class="me-2 d-flex align-items-center">
                <i class="fas fa-filter me-2 text-success"></i>
                <strong>Filter:</strong>
            </label>
            <select name="year" class="form-select me-2">
                <option value="">All Years</option>
                <?php foreach ($years as $yearOption): ?>
                    <option value="<?php echo $yearOption; ?>" <?php echo $year == $yearOption ? 'selected' : ''; ?>>
                        <?php echo $yearOption; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="sort" value="<?php echo htmlspecialchars($sort); ?>">
            <button type="submit" class="btn btn-outline-success">
                <i class="fas fa-check me-1"></i>Apply
            </button>
        </form>
    </div>
    
    <!-- Sort options on the right -->
    <div class="col-md-6">
        <form method="GET" class="d-flex justify-content-end">
            <label class="me-2 d-flex align-items-center">
                <i class="fas fa-sort me-2 text-info"></i>
                <strong>Sort:</strong>
            </label>
            <select name="sort" class="form-select me-2" style="width: auto;">
                <option value="votes" <?php echo $sort === 'votes' ? 'selected' : ''; ?>>By Votes</option>
                <option value="date" <?php echo $sort === 'date' ? 'selected' : ''; ?>>By Date</option>
                <option value="title" <?php echo $sort === 'title' ? 'selected' : ''; ?>>By Title</option>
            </select>
            <input type="hidden" name="year" value="<?php echo htmlspecialchars($year); ?>">
            <button type="submit" class="btn btn-outline-info">
                <i class="fas fa-check me-1"></i>Apply
            </button>
        </form>
    </div>
</div>

<!-- Empty state when no projects match filters -->
<?php if (empty($projects)): ?>
    <div class="text-center py-5">
        <i class="fas fa-search fa-3x text-muted mb-3"></i>
        <h3 class="text-muted">No projects found</h3>
        <p class="text-muted">
            <?php if ($year): ?>
                No projects were submitted in <?php echo $year; ?>.
            <?php else: ?>
                No projects have been uploaded yet. Be the first!
            <?php endif; ?>
        </p>
        <?php if (isTeacher() || isAdmin()): ?>
            <a href="upload.php" class="btn btn-primary mt-3">
                <i class="fas fa-plus me-2"></i>Upload First Project
            </a>
        <?php endif; ?>
    </div>
    
<!-- Project cards grid -->
<?php else: ?>
    <div class="row">
        <?php foreach ($projects as $project): ?>
            <!-- Individual project card -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 project-card">
                    <div class="card-body">
                        <!-- Top row: year badge and vote count -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-success"><?php echo $project['year']; ?></span>
                            <div class="vote-display">
                                <i class="fas fa-heart"></i>
                                <span class="vote-count"><?php echo $project['vote_count']; ?></span>
                            </div>
                        </div>
                        
                        <!-- Project title -->
                        <h5 class="card-title mb-2">
                            <a href="project.php?id=<?php echo $project['id']; ?>" class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($project['title']); ?>
                            </a>
                        </h5>
                        
                        <!-- Author and date info -->
                        <p class="card-text text-muted small mb-3">
                            <i class="fas fa-user me-1"></i>by <?php echo htmlspecialchars($project['author_name']); ?>
                            <br>
                            <i class="fas fa-calendar me-1"></i><?php echo date('M j, Y', strtotime($project['created_at'])); ?>
                        </p>
                        
                        <!-- Project description preview -->
                        <?php if ($project['description']): ?>
                            <p class="card-text">
                                <?php echo htmlspecialchars(substr($project['description'], 0, 100)); ?>
                                <?php echo strlen($project['description']) > 100 ? '...' : ''; ?>
                            </p>
                        <?php endif; ?>
                        
                        <!-- Bottom action buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                            <a href="project.php?id=<?php echo $project['id']; ?>" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-book-open me-1"></i>Read More
                            </a>
                            
                            <!-- Voting section -->
                            <?php if (isLoggedIn()): ?>
                                <?php if (hasUserVoted($_SESSION['user_id'], $project['id'])): ?>
                                    <!-- Already voted -->
                                    <small class="text-success fw-bold">
                                        <i class="fas fa-check-circle"></i> Voted
                                    </small>
                                <?php else: ?>
                                    <!-- Vote button -->
                                    <form method="POST" action="vote.php" class="d-inline">
                                        <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
                                        <input type="hidden" name="redirect" value="projects.php">
                                        <button type="submit" class="btn btn-sm vote-btn">
                                            <i class="fas fa-heart me-1"></i>Vote
                                        </button>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                <!-- Login to vote -->
                                <a href="login.php" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-sign-in-alt me-1"></i>Login to Vote
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>