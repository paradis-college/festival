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
    
    // Validate YouTube URL if provided
    if (!empty($media_url)) {
        $validation = validateYouTubeUrl($media_url);
        if (!$validation['valid']) {
            header("Location: edit.php?id={$id}&error=invalid_video_url");
            exit();
        }
    }
    
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
                <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_video_url'): ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        The YouTube URL you provided is not valid. Please check the URL and try again.
                    </div>
                <?php endif; ?>
                
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
                               placeholder="https://www.youtube.com/watch?v=..." oninput="validateYouTubeURL(this)">
                        <div class="form-text">
                            Paste a YouTube video URL to embed it in your project (e.g., https://www.youtube.com/watch?v=dQw4w9WgXcQ)<br>
                            <small>Supports: <code>youtube.com</code>, <code>youtu.be</code>, <code>youtube.com/shorts</code></small>
                        </div>
                        <div id="url-validation-feedback" class="mt-2"></div>
                        <div id="video-preview" class="mt-3"></div>
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

<script>
function validateYouTubeURL(input) {
    const url = input.value.trim();
    const feedbackDiv = document.getElementById('url-validation-feedback');
    const previewDiv = document.getElementById('video-preview');
    
    // Clear previous feedback and preview
    feedbackDiv.innerHTML = '';
    previewDiv.innerHTML = '';
    
    if (!url) {
        input.classList.remove('is-valid', 'is-invalid');
        return; // Empty is valid
    }
    
    // Enhanced YouTube URL patterns
    const patterns = [
        /(?:youtube\.com|www\.youtube\.com)\/watch\?.*?v=([a-zA-Z0-9_-]{11})/,
        /(?:youtu\.be)\/([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/embed\/([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/shorts\/([a-zA-Z0-9_-]{11})/,
        /(?:m\.youtube\.com)\/watch\?.*?v=([a-zA-Z0-9_-]{11})/,
        /(?:youtube\.com|www\.youtube\.com)\/live\/([a-zA-Z0-9_-]{11})/
    ];
    
    let videoId = null;
    for (const pattern of patterns) {
        const match = url.match(pattern);
        if (match) {
            videoId = match[1];
            break;
        }
    }
    
    if (videoId) {
        // Valid YouTube URL
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
        feedbackDiv.innerHTML = '<div class="text-success small"><i class="fas fa-check-circle me-1"></i>Valid YouTube URL detected</div>';
        
        // Show preview thumbnail
        const thumbnailUrl = `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
        previewDiv.innerHTML = `
            <div class="card">
                <div class="card-body p-3">
                    <h6 class="card-title mb-2"><i class="fab fa-youtube text-danger me-1"></i>Video Preview</h6>
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="${thumbnailUrl}" class="img-fluid rounded" alt="Video thumbnail" style="max-height: 90px;">
                        </div>
                        <div class="col-md-8">
                            <small class="text-muted">Video ID: <code>${videoId}</code></small><br>
                            <small class="text-success">✓ This video will be embedded in your project</small>
                        </div>
                    </div>
                </div>
            </div>
        `;
    } else {
        // Invalid YouTube URL
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        feedbackDiv.innerHTML = `
            <div class="text-danger small">
                <i class="fas fa-exclamation-triangle me-1"></i>
                Please enter a valid YouTube URL (youtube.com or youtu.be)
            </div>
        `;
    }
}

// Validate existing URL on page load
document.addEventListener('DOMContentLoaded', function() {
    const mediaUrlInput = document.getElementById('media_url');
    if (mediaUrlInput && mediaUrlInput.value) {
        validateYouTubeURL(mediaUrlInput);
    }
});
</script>

<?php include 'includes/footer.php'; ?>