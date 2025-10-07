<?php
// Include core functions and check if project exists
require_once 'includes/functions.php';

// Get project ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$project = getProject($id);

// If project doesn't exist, redirect to projects page
if (!$project) {
    header('Location: projects.php');
    exit();
}

// Get comments for this project
$comments = getComments($id);

// Set page title to project name
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
        
        <!-- Comments Section -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-comments me-2"></i>Comments 
                    <span class="badge bg-light text-dark"><?php echo count($comments); ?></span>
                </h5>
            </div>
            <div class="card-body">
                <!-- Add comment form - only for logged in users -->
                <?php if (isLoggedIn()): ?>
                    <div class="mb-4">
                        <h6 class="mb-3">Add a comment:</h6>
                        
                        <!-- Pre-written positive comments as quick buttons -->
                        <div class="mb-3">
                            <small class="text-muted d-block mb-2">Quick positive comments (click to use):</small>
                            <div class="d-flex flex-wrap">
                                <?php 
                                $prewritten = getPrewrittenComments();
                                // Show 5 random pre-written comments
                                $selected = array_rand(array_flip($prewritten), min(5, count($prewritten)));
                                foreach ($selected as $quickComment): 
                                ?>
                                    <button type="button" class="btn btn-sm quick-comment-btn" 
                                            onclick="document.getElementById('comment_text').value = '<?php echo addslashes($quickComment); ?>'">
                                        <?php echo htmlspecialchars($quickComment); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <!-- Comment form -->
                        <form method="POST" action="comment.php">
                            <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
                            <div class="mb-3">
                                <textarea class="form-control" id="comment_text" name="comment_text" 
                                          rows="3" placeholder="Write your comment here..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-paper-plane me-2"></i>Post Comment
                            </button>
                        </form>
                    </div>
                    <hr>
                <?php else: ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <a href="login.php" class="alert-link">Login</a> to leave a comment on this project.
                    </div>
                <?php endif; ?>
                
                <!-- Display existing comments -->
                <?php if (empty($comments)): ?>
                    <p class="text-muted text-center py-3">
                        <i class="fas fa-comment-slash me-2"></i>No comments yet. Be the first to comment!
                    </p>
                <?php else: ?>
                    <div class="comments-list mt-3">
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment-item">
                                <div class="comment-author">
                                    <i class="fas fa-user-circle me-1"></i>
                                    <?php echo htmlspecialchars($comment['username']); ?>
                                    <span class="badge bg-secondary ms-2"><?php echo ucfirst($comment['role']); ?></span>
                                </div>
                                <div class="comment-text">
                                    <?php echo htmlspecialchars($comment['comment_text']); ?>
                                </div>
                                <div class="comment-time">
                                    <i class="fas fa-clock me-1"></i>
                                    <?php echo date('F j, Y \a\t g:i A', strtotime($comment['created_at'])); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
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
                            <button type="submit" class="btn btn-success btn-lg w-100">
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