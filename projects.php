<?php
require_once 'includes/functions.php';

// Get all projects with filtering options
$year = isset($_GET['year']) ? $_GET['year'] : null;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'votes';

$projects = getProjects($year);

// Sort projects based on selection
if ($sort === 'date') {
    usort($projects, function($a, $b) {
        return strtotime($b['created_at']) - strtotime($a['created_at']);
    });
} elseif ($sort === 'title') {
    usort($projects, function($a, $b) {
        return strcmp($a['title'], $b['title']);
    });
}
// Default is by votes (already sorted by vote_count in getProjects)

$years = getYears();
$title = 'All Projects';
include 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>All Projects</h2>
    <?php if (isTeacher() || isAdmin()): ?>
        <a href="upload.php" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Upload Project
        </a>
    <?php endif; ?>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <form method="GET" class="d-flex">
            <select name="year" class="form-select me-2">
                <option value="">All Years</option>
                <?php foreach ($years as $yearOption): ?>
                    <option value="<?php echo $yearOption; ?>" <?php echo $year == $yearOption ? 'selected' : ''; ?>>
                        <?php echo $yearOption; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="sort" value="<?php echo htmlspecialchars($sort); ?>">
            <button type="submit" class="btn btn-outline-primary">Filter</button>
        </form>
    </div>
    <div class="col-md-6">
        <form method="GET" class="d-flex justify-content-end">
            <select name="sort" class="form-select me-2" style="width: auto;">
                <option value="votes" <?php echo $sort === 'votes' ? 'selected' : ''; ?>>Sort by Votes</option>
                <option value="date" <?php echo $sort === 'date' ? 'selected' : ''; ?>>Sort by Date</option>
                <option value="title" <?php echo $sort === 'title' ? 'selected' : ''; ?>>Sort by Title</option>
            </select>
            <input type="hidden" name="year" value="<?php echo htmlspecialchars($year); ?>">
            <button type="submit" class="btn btn-outline-primary">Sort</button>
        </form>
    </div>
</div>

<?php if (empty($projects)): ?>
    <div class="text-center py-5">
        <i class="fas fa-search fa-3x text-muted mb-3"></i>
        <h3 class="text-muted">No projects found</h3>
        <p class="text-muted">
            <?php if ($year): ?>
                No projects were submitted in <?php echo $year; ?>.
            <?php else: ?>
                No projects have been uploaded yet.
            <?php endif; ?>
        </p>
        <?php if (isTeacher() || isAdmin()): ?>
            <a href="upload.php" class="btn btn-primary">Upload First Project</a>
        <?php endif; ?>
    </div>
<?php else: ?>
    <div class="row">
        <?php foreach ($projects as $project): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 project-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-secondary"><?php echo $project['year']; ?></span>
                            <div class="vote-display">
                                <i class="fas fa-heart text-danger"></i>
                                <span class="vote-count"><?php echo $project['vote_count']; ?></span>
                            </div>
                        </div>
                        
                        <h5 class="card-title">
                            <a href="project.php?id=<?php echo $project['id']; ?>" class="text-decoration-none">
                                <?php echo htmlspecialchars($project['title']); ?>
                            </a>
                        </h5>
                        
                        <p class="card-text text-muted small mb-2">
                            by <?php echo htmlspecialchars($project['author_name']); ?>
                            <span class="text-muted">• <?php echo date('M j, Y', strtotime($project['created_at'])); ?></span>
                        </p>
                        
                        <?php if ($project['description']): ?>
                            <p class="card-text">
                                <?php echo htmlspecialchars(substr($project['description'], 0, 100)); ?>
                                <?php echo strlen($project['description']) > 100 ? '...' : ''; ?>
                            </p>
                        <?php endif; ?>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="project.php?id=<?php echo $project['id']; ?>" class="btn btn-outline-primary btn-sm">
                                Read More
                            </a>
                            
                            <?php if (isLoggedIn()): ?>
                                <?php if (hasUserVoted($_SESSION['user_id'], $project['id'])): ?>
                                    <small class="text-muted">
                                        <i class="fas fa-check-circle text-success"></i> Voted
                                    </small>
                                <?php else: ?>
                                    <form method="POST" action="vote.php" class="d-inline">
                                        <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
                                        <input type="hidden" name="redirect" value="projects.php">
                                        <button type="submit" class="btn btn-outline-danger btn-sm vote-btn">
                                            <i class="fas fa-heart"></i> Vote
                                        </button>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-outline-secondary btn-sm">
                                    Login to Vote
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