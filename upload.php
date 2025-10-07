<?php
require_once 'includes/functions.php';
requireTeacher();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $year = intval($_POST['year']);
    
    // Handle file upload
    if (isset($_FILES['markdown_file']) && $_FILES['markdown_file']['error'] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES['markdown_file'];
        $fileExtension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
        
        if ($fileExtension === 'md') {
            $content = file_get_contents($uploadedFile['tmp_name']);
            
            if (createProject($title, $description, $content, $_SESSION['user_id'], $year)) {
                header('Location: index.php?success=upload');
                exit();
            }
        }
    } else {
        // Manual content input
        $content = trim($_POST['content']);
        
        if (createProject($title, $description, $content, $_SESSION['user_id'], $year)) {
            header('Location: index.php?success=upload');
            exit();
        }
    }
    
    header('Location: upload.php?error=upload');
    exit();
}

$title = 'Upload Project';
include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    <i class="fas fa-upload me-2"></i>Upload New Project
                </h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Project Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Short Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" 
                                  placeholder="Brief description of your project..."></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <select class="form-select" id="year" name="year" required>
                            <?php 
                            $currentYear = date('Y');
                            for ($y = $currentYear; $y >= $currentYear - 5; $y--): 
                            ?>
                                <option value="<?php echo $y; ?>" <?php echo $y == $currentYear ? 'selected' : ''; ?>>
                                    <?php echo $y; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Content Input Method</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="input_method" id="file_upload" value="file" checked>
                            <label class="form-check-label" for="file_upload">
                                Upload Markdown File (.md)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="input_method" id="manual_input" value="manual">
                            <label class="form-check-label" for="manual_input">
                                Type Content Manually
                            </label>
                        </div>
                    </div>
                    
                    <div id="file_upload_section" class="mb-3">
                        <label for="markdown_file" class="form-label">Upload Markdown File</label>
                        <input type="file" class="form-control" id="markdown_file" name="markdown_file" accept=".md">
                        <div class="form-text">Upload a .md file containing your project content.</div>
                    </div>
                    
                    <div id="manual_input_section" class="mb-3" style="display: none;">
                        <label for="content" class="form-label">Project Content (Markdown)</label>
                        <textarea class="form-control" id="content" name="content" rows="15" 
                                  placeholder="# Project Title

## Introduction
Write your project introduction here...

## Methodology
Describe your methodology...

## Results
Present your results...

## Conclusion
Summarize your findings..."></textarea>
                        <div class="form-text">You can use Markdown formatting (# for headers, **bold**, *italic*, etc.)</div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload me-2"></i>Upload Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Markdown Quick Reference
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Headers</h6>
                        <code># Header 1</code><br>
                        <code>## Header 2</code><br>
                        <code>### Header 3</code>
                    </div>
                    <div class="col-md-6">
                        <h6>Text Formatting</h6>
                        <code>**Bold text**</code><br>
                        <code>*Italic text*</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileUploadRadio = document.getElementById('file_upload');
    const manualInputRadio = document.getElementById('manual_input');
    const fileUploadSection = document.getElementById('file_upload_section');
    const manualInputSection = document.getElementById('manual_input_section');
    
    function toggleSections() {
        if (fileUploadRadio.checked) {
            fileUploadSection.style.display = 'block';
            manualInputSection.style.display = 'none';
            document.getElementById('markdown_file').required = true;
            document.getElementById('content').required = false;
        } else {
            fileUploadSection.style.display = 'none';
            manualInputSection.style.display = 'block';
            document.getElementById('markdown_file').required = false;
            document.getElementById('content').required = true;
        }
    }
    
    fileUploadRadio.addEventListener('change', toggleSections);
    manualInputRadio.addEventListener('change', toggleSections);
});
</script>

<?php include 'includes/footer.php'; ?>