<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#07154f">
    <title><?php echo isset($title) ? $title . ' - ' : ''; ?>Paradis Science Festival</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/refinement.css" rel="stylesheet">
    <link href="assets/css/content.css" rel="stylesheet">
    <link href="assets/css/content-review-fixes.css" rel="stylesheet">
    <link href="assets/css/platform-positioning.css" rel="stylesheet">
    <link href="assets/css/listing-pages.css" rel="stylesheet">
    <script src="assets/js/main.js" defer></script>
    <script src="assets/js/content-review-fixes.js" defer></script>
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to main content</a>

    <nav id="navbar" aria-label="Primary navigation">
        <div class="navbar-shell">
            <a class="navbar-brand-link" href="index.php" aria-label="Paradis Science Festival home">
                <span class="brand-label">Paradis Science Festival</span>
            </a>

            <div class="navbar-links" aria-label="Festival pages">
                <a href="index.php">Home</a>
                <a href="news.php">News</a>
                <a href="projects.php">Projects</a>
                <a href="about.php">About</a>
                <a href="community.php">Community</a>
            </div>

            <div class="navbar-account" aria-label="Account links">
                <?php if (isLoggedIn()): ?>
                    <?php if (isTeacher() || isAdmin()): ?>
                        <a href="upload.php" class="nav-action">Upload Project</a>
                    <?php endif; ?>
                    <a href="actions.php?action=logout" class="nav-account-link">
                        Logout <span class="nav-username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </a>
                <?php else: ?>
                    <a href="login.php" class="nav-account-link">Login</a>
                    <a href="register.php" class="nav-action">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <header class="site-header">
        <div class="container site-header-inner">
            <div class="site-header-copy">
                <p class="site-kicker">Paradis International College</p>
                <h1 class="logo">Paradis <span>Science Festival</span></h1>
                <p class="tagline">A project platform, public showcase and archive for student-led science.</p>
            </div>
            <img
                src="assets/images/download paradis college.png"
                alt="Paradis International College logo"
                class="site-logo-image"
            >
        </div>
    </header>

    <main id="main-content" class="container mt-4">
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="status">
                <i class="fas fa-check-circle me-2" aria-hidden="true"></i>
                <?php
                switch($_GET['success']) {
                    case 'login': echo 'Welcome back! Login successful.'; break;
                    case 'register': echo 'Account created! You can now login.'; break;
                    case 'upload': echo 'Project uploaded successfully!'; break;
                    case 'vote': echo 'Your vote has been recorded!'; break;
                    case 'comment': echo 'Comment posted successfully!'; break;
                    default: echo 'Operation completed successfully!';
                }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2" aria-hidden="true"></i>
                <?php
                switch($_GET['error']) {
                    case 'login': echo 'Invalid username or password!'; break;
                    case 'register': echo 'Registration failed. Username or email already exists!'; break;
                    case 'access_denied': echo 'Access denied. You need teacher privileges!'; break;
                    case 'upload': echo 'Failed to upload project!'; break;
                    case 'vote': echo 'Failed to record vote!'; break;
                    case 'already_voted': echo 'You have already voted for this project!'; break;
                    default: echo 'An error occurred!';
                }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>