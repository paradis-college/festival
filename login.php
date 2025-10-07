<?php
// Include core functions to handle login
require_once 'includes/functions.php';

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    // Check if fields are filled
    if (empty($username) || empty($password)) {
        header('Location: login.php?error=login');
        exit();
    }
    
    // Attempt to log in the user
    if (loginUser($username, $password)) {
        header('Location: index.php?success=login');
        exit();
    } else {
        header('Location: login.php?error=login');
        exit();
    }
}

// Set page title
$title = 'Login';
include 'includes/header.php';
?>

<!-- Login form card - centered on page -->
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow">
            <!-- Card header with icon and title -->
            <div class="card-header text-center">
                <h3 class="mb-0">
                    <i class="fas fa-sign-in-alt me-2"></i>Welcome Back
                </h3>
                <p class="mb-0 mt-2 small">Login to access your account</p>
            </div>
            
            <div class="card-body p-4">
                <!-- Login form -->
                <form method="POST">
                    <!-- Username field -->
                    <div class="mb-3">
                        <label for="username" class="form-label">
                            <i class="fas fa-user me-1"></i>Username or Email
                        </label>
                        <input type="text" class="form-control" id="username" name="username" 
                               placeholder="Enter your username or email" required>
                    </div>
                    
                    <!-- Password field -->
                    <div class="mb-4">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-1"></i>Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Enter your password" required>
                    </div>
                    
                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </div>
                </form>
                
                <hr class="my-4">
                
                <!-- Register link -->
                <div class="text-center">
                    <p class="mb-0">Don't have an account? 
                        <a href="register.php" class="fw-bold text-decoration-none">
                            Register here <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </p>
                </div>
                
                <!-- Demo accounts info -->
                <div class="alert alert-info mt-4 mb-0">
                    <h6 class="alert-heading">
                        <i class="fas fa-info-circle me-2"></i>Demo Accounts
                    </h6>
                    <small>
                        <strong>Teacher:</strong> teacher1 / admin123<br>
                        <strong>Student:</strong> student1 / admin123<br>
                        <strong>Admin:</strong> admin / admin123
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>