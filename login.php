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

<!-- Login form card - centered on page with improved accessibility -->
<div class="row justify-content-center" style="margin-top: 40px; margin-bottom: 60px;">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow" style="border-radius: 16px;">
            <!-- Card header with icon and title -->
            <div class="card-header text-center" style="padding: 2rem 1.5rem;">
                <h2 class="mb-2" style="font-size: 2rem; font-weight: 700;">
                    <i class="fas fa-sign-in-alt me-2"></i>Welcome Back
                </h2>
                <p class="mb-0" style="font-size: 1.1rem; opacity: 0.95;">Login to access your account</p>
            </div>
            
            <div class="card-body p-5">
                <!-- Login form -->
                <form method="POST">
                    <!-- Username field -->
                    <div class="mb-4">
                        <label for="username" class="form-label" style="font-size: 1.1rem; font-weight: 600; color: #2c3e50;">
                            <i class="fas fa-user me-2"></i>Username or Email
                        </label>
                        <input type="text" class="form-control form-control-lg" id="username" name="username" 
                               placeholder="Enter your username or email" required
                               style="font-size: 1.1rem; padding: 0.8rem 1rem; border-radius: 10px;">
                    </div>
                    
                    <!-- Password field -->
                    <div class="mb-5">
                        <label for="password" class="form-label" style="font-size: 1.1rem; font-weight: 600; color: #2c3e50;">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" 
                               placeholder="Enter your password" required
                               style="font-size: 1.1rem; padding: 0.8rem 1rem; border-radius: 10px;">
                    </div>
                    
                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg" style="font-size: 1.2rem; padding: 1rem; font-weight: 600; border-radius: 10px;">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </div>
                </form>
                
                <hr class="my-5">
                
                <!-- Register link -->
                <div class="text-center">
                    <p class="mb-0" style="font-size: 1.1rem; color: #2c3e50;">Don't have an account? 
                        <a href="register.php" class="fw-bold text-decoration-none" style="font-size: 1.1rem;">
                            Register here <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </p>
                </div>
                
                <!-- Demo accounts info -->
                <div class="alert alert-info mt-5 mb-0" style="border-radius: 12px; padding: 1.5rem; background-color: #e8f4f8; border: 2px solid #17a2b8;">
                    <h5 class="alert-heading" style="font-size: 1.2rem; font-weight: 700; color: #0c5460; margin-bottom: 1rem;">
                        <i class="fas fa-info-circle me-2"></i>Demo Accounts
                    </h5>
                    <div style="font-size: 1.05rem; color: #0c5460; line-height: 1.8;">
                        <strong>Teacher:</strong> teacher1 / admin123<br>
                        <strong>Student:</strong> student1 / admin123<br>
                        <strong>Admin:</strong> admin / admin123
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>