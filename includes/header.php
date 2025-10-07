<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic meta tags for page setup -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Page title - shows in browser tab -->
    <title><?php echo isset($title) ? $title . ' - ' : ''; ?>International Science Festival</title>
    
    <!-- External CSS libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Our custom styles - you can edit this file to change colors and design -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Top navigation bar - contains logo and menu items -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Site logo and name -->
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-graduation-cap me-2"></i>International Science Festival
            </a>
            
            <!-- Mobile menu toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation menu items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Left side menu -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="projects.php">
                            <i class="fas fa-folder-open me-1"></i>All Projects
                        </a>
                    </li>
                    <!-- Only teachers and admins can see the upload button -->
                    <?php if (isTeacher() || isAdmin()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="upload.php">
                            <i class="fas fa-upload me-1"></i>Upload Project
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                
                <!-- Right side menu - user account section -->
                <ul class="navbar-nav">
                    <!-- Show this if user is logged in -->
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i><?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><span class="dropdown-item-text text-muted">
                                    <i class="fas fa-id-badge me-1"></i>Role: <?php echo ucfirst($_SESSION['role']); ?>
                                </span></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                                </a></li>
                            </ul>
                        </li>
                    <!-- Show login/register buttons if not logged in -->
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">
                                <i class="fas fa-user-plus me-1"></i>Register
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content container - all page content goes here -->
    <div class="container mt-4">    <!-- Success and error messages - shown after actions -->
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?php
            // Display appropriate success message based on action
            switch($_GET['success']) {
                case 'login': echo 'Welcome back! Login successful.'; break;
                case 'register': echo 'Account created! You can now login.'; break;
                case 'upload': echo 'Project uploaded successfully!'; break;
                case 'vote': echo 'Your vote has been recorded!'; break;
                case 'comment': echo 'Comment posted successfully!'; break;
                default: echo 'Operation completed successfully!';
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <?php
            // Display appropriate error message based on issue
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
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>