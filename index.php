<?php
require_once 'includes/functions.php';
$title = 'Home';

// Get recent projects and statistics
$recentProjects = getProjects(null, 6);
$years = getYears();
$selectedYear = isset($_GET['year']) ? $_GET['year'] : null;

if ($selectedYear) {
    $recentProjects = getProjects($selectedYear, 6);
}

include 'includes/header.php';
?>

<div class="hero-section bg-primary text-white py-5 mb-5 rounded">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-4">
            <i class="fas fa-flask me-3"></i>Science Festival
        </h1>
        <p class="lead mb-4">Discover innovative science projects from the past 5 years</p>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <h3 class="fw-bold"><?php echo count(getProjects()); ?></h3>
                    <p>Total Projects</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <h3 class="fw-bold"><?php echo count($years); ?></h3>
                    <p>Years Covered</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <h3 class="fw-bold">
                        <?php 
                        $totalVotes = 0;
                        foreach(getProjects() as $project) {
                            $totalVotes += $project['vote_count'] ?? 0;
                        }
                        echo $totalVotes;
                        ?>
                    </h3>
                    <p>Total Votes</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-8">
        <h2 class="mb-4">
            <?php echo $selectedYear ? "Projects from $selectedYear" : "Recent Projects"; ?>
        </h2>
    </div>
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

<?php if (empty($recentProjects)): ?>
    <div class="text-center py-5">
        <i class="fas fa-search fa-3x text-muted mb-3"></i>
        <h3 class="text-muted">No projects found</h3>
        <p class="text-muted">
            <?php if ($selectedYear): ?>
                No projects were submitted in <?php echo $selectedYear; ?>.
            <?php else: ?>
                Be the first to upload a project!
            <?php endif; ?>
        </p>
        <?php if (isTeacher() || isAdmin()): ?>
            <a href="upload.php" class="btn btn-primary">Upload First Project</a>
        <?php endif; ?>
    </div>
<?php else: ?>
    <div class="row">
        <?php foreach ($recentProjects as $project): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 project-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-secondary"><?php echo $project['year']; ?></span>
                            <div class="vote-display">
                                <i class="fas fa-heart text-danger"></i>
                                <span class="vote-count"><?php echo $project['vote_count'] ?? '0'; ?></span>
                            </div>
                        </div>
                        
                        <h5 class="card-title">
                            <a href="project.php?id=<?php echo $project['id']; ?>" class="text-decoration-none">
                                <?php echo htmlspecialchars($project['title']); ?>
                            </a>
                        </h5>
                        
                        <p class="card-text text-muted small mb-2">
                            by <?php echo htmlspecialchars($project['author_name'] ?? 'Unknown'); ?>
                        </p>
                        
                        <?php if ($project['description']): ?>
                            <p class="card-text">
                                <?php echo htmlspecialchars(substr($project['description'], 0, 100)); ?>
                                <?php echo strlen($project['description']) > 100 ? '...' : ''; ?>
                            </p>
                        <?php endif; ?>
                        
                        <div class="d-flex justify-content-between align-items-center">
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
                                        <button type="submit" class="btn btn-outline-danger btn-sm vote-btn">
                                            <i class="fas fa-heart"></i> Vote
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
    
    <div class="text-center mt-4">
        <a href="projects.php" class="btn btn-primary">View All Projects</a>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>