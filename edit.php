<?php
require_once 'includes/functions.php';
requireLogin();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$project = getProject($id);

if (!$project) {
    header('Location: projects.php');
    exit();
}

// Check if user can edit this project
if ($_SESSION['user_id'] != $project['author_id'] && !isAdmin()) {
    header('Location: index.php?error=access_denied');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $content = trim($_POST['content']);
    $year = intval($_POST['year']);
    $media_url = trim($_POST['media_url'] ?? '');
    
    if (updateProject($id, $title, $description, $content, $year, $media_url)) {
        header("Location: project.php?id=$id&success=update");
        exit();
    } else {
        header("Location: edit.php?id=$id&error=update");
        exit();
    }
}

$title = 'Edit Project';
include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Edit Project
                </h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Project Title</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="<?php echo htmlspecialchars($project['title']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Short Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($project['description']); ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="media_url" class="form-label">
                            <i class="fas fa-video me-1"></i>Media URL (YouTube Video)
                        </label>
                        <input type="url" class="form-control" id="media_url" name="media_url" 
                               value="<?php echo htmlspecialchars($project['media_url'] ?? ''); ?>" 
                               placeholder="https://www.youtube.com/watch?v=...">
                        <div class="form-text">
                            Paste a YouTube video URL to embed it in your project (e.g., https://www.youtube.com/watch?v=dQw4w9WgXcQ)
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <select class="form-select" id="year" name="year" required>
                            <?php 
                            $currentYear = date('Y');
                            for ($y = $currentYear; $y >= $currentYear - 5; $y--): 
                            ?>
                                <option value="<?php echo $y; ?>" <?php echo $y == $project['year'] ? 'selected' : ''; ?>>
                                    <?php echo $y; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="content" class="form-label">Project Content (Markdown)</label>
                        <textarea class="form-control" id="content" name="content" rows="15" required><?php echo htmlspecialchars($project['content']); ?></textarea>
                        <div class="form-text">You can use Markdown formatting (# for headers, **bold**, *italic*, etc.)</div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Changes
                        </button>
                        <a href="project.php?id=<?php echo $project['id']; ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>