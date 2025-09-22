<?php
require_once 'includes/functions.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$project = getProject($id);

if (!$project) {
    header('Location: projects.php');
    exit();
}

$title = $project['title'];
include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h3 class="mb-1"><?php echo htmlspecialchars($project['title']); ?></h3>
                        <div class="text-muted small">
                            by <?php echo htmlspecialchars($project['author_name']); ?>
                            • <?php echo date('M j, Y', strtotime($project['created_at'])); ?>
                            • Year: <?php echo $project['year']; ?>
                        </div>
                    </div>
                    <span class="badge bg-secondary fs-6"><?php echo $project['year']; ?></span>
                </div>
            </div>
            <div class="card-body">
                <?php if ($project['description']): ?>
                    <div class="alert alert-info">
                        <strong>Description:</strong> <?php echo htmlspecialchars($project['description']); ?>
                    </div>
                <?php endif; ?>
                
                <div class="project-content">
                    <?php echo parseMarkdown($project['content']); ?>
                </div>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="projects.php" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Projects
            </a>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-heart text-danger me-2"></i>Project Votes
                </h5>
            </div>
            <div class="card-body text-center">
                <div class="vote-display-large mb-3">
                    <i class="fas fa-heart text-danger fa-3x"></i>
                    <h2 class="mt-2"><?php echo $project['vote_count']; ?></h2>
                    <p class="text-muted">Total Votes</p>
                </div>
                
                <?php if (isLoggedIn()): ?>
                    <?php if (hasUserVoted($_SESSION['user_id'], $project['id'])): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>
                            You have already voted for this project!
                        </div>
                        <form method="POST" action="vote.php">
                            <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
                            <input type="hidden" name="action" value="remove">
                            <input type="hidden" name="redirect" value="project.php?id=<?php echo $project['id']; ?>">
                            <button type="submit" class="btn btn-outline-secondary btn-sm">
                                Remove Vote
                            </button>
                        </form>
                    <?php else: ?>
                        <form method="POST" action="vote.php">
                            <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
                            <input type="hidden" name="redirect" value="project.php?id=<?php echo $project['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-lg w-100">
                                <i class="fas fa-heart me-2"></i>Vote for this Project
                            </button>
                        </form>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <a href="login.php" class="btn btn-primary w-100">
                            Login to Vote
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Project Information</h6>
            </div>
            <div class="card-body">
                <dl class="mb-0">
                    <dt>Author</dt>
                    <dd><?php echo htmlspecialchars($project['author_name']); ?></dd>
                    
                    <dt>Year</dt>
                    <dd><?php echo $project['year']; ?></dd>
                    
                    <dt>Published</dt>
                    <dd><?php echo date('F j, Y', strtotime($project['created_at'])); ?></dd>
                    
                    <?php if ($project['updated_at'] !== $project['created_at']): ?>
                    <dt>Last Updated</dt>
                    <dd><?php echo date('F j, Y', strtotime($project['updated_at'])); ?></dd>
                    <?php endif; ?>
                </dl>
            </div>
        </div>
        
        <?php if (isLoggedIn() && ($_SESSION['user_id'] == $project['author_id'] || isAdmin())): ?>
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Project Management</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="edit.php?id=<?php echo $project['id']; ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-edit me-2"></i>Edit Project
                    </a>
                    <button class="btn btn-outline-danger btn-sm" onclick="confirmDelete(<?php echo $project['id']; ?>)">
                        <i class="fas fa-trash me-2"></i>Delete Project
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Related Projects</h6>
            </div>
            <div class="card-body">
                <?php 
                $relatedProjects = getProjects($project['year'], 3);
                $relatedProjects = array_filter($relatedProjects, function($p) use ($project) {
                    return $p['id'] != $project['id'];
                });
                $relatedProjects = array_slice($relatedProjects, 0, 3);
                ?>
                
                <?php if (empty($relatedProjects)): ?>
                    <p class="text-muted small mb-0">No related projects found.</p>
                <?php else: ?>
                    <?php foreach ($relatedProjects as $related): ?>
                        <div class="border-bottom pb-2 mb-2">
                            <h6 class="mb-1">
                                <a href="project.php?id=<?php echo $related['id']; ?>" class="text-decoration-none">
                                    <?php echo htmlspecialchars($related['title']); ?>
                                </a>
                            </h6>
                            <small class="text-muted">
                                <?php echo $related['vote_count']; ?> votes
                            </small>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(projectId) {
    if (confirm('Are you sure you want to delete this project? This action cannot be undone.')) {
        window.location.href = 'delete.php?id=' + projectId;
    }
}
</script>

<?php include 'includes/footer.php'; ?>