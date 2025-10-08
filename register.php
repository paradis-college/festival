<?php
// Include core functions to handle registration
require_once 'includes/functions.php';

// Process registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $role = $_POST['role'];
    
    // Validate all fields are filled
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        header('Location: register.php?error=register');
        exit();
    }
    
    // Check if passwords match
    if ($password !== $confirmPassword) {
        header('Location: register.php?error=register');
        exit();
    }
    
    // Attempt to create the new user account
    if (registerUser($username, $email, $password, $role)) {
        header('Location: login.php?success=register');
        exit();
    } else {
        header('Location: register.php?error=register');
        exit();
    }
}

// Set page title
$title = 'Register';
include 'includes/header.php';
?>

<!-- Registration form card - centered on page -->
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow">
            <!-- Card header with icon and title -->
            <div class="card-header text-center">
                <h3 class="mb-0">
                    <i class="fas fa-user-plus me-2"></i>Create Account
                </h3>
                <p class="mb-0 mt-2 small">Join our science community</p>
            </div>
            
            <div class="card-body p-4">
                <!-- Registration form -->
                <form method="POST">
                    <!-- Username field -->
                    <div class="mb-3">
                        <label for="username" class="form-label">
                            <i class="fas fa-user me-1"></i>Username
                        </label>
                        <input type="text" class="form-control" id="username" name="username" 
                               placeholder="Choose a username" required>
                    </div>
                    
                    <!-- Email field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-1"></i>Email Address
                        </label>
                        <input type="email" class="form-control" id="email" name="email" 
                               placeholder="your.email@example.com" required>
                    </div>
                    
                    <!-- Role selection -->
                    <div class="mb-3">
                        <label for="role" class="form-label">
                            <i class="fas fa-id-badge me-1"></i>I am a...
                        </label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="student" selected>Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>Students can view and vote. Teachers can upload projects.
                        </div>
                    </div>
                    
                    <!-- Password field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-1"></i>Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Create a strong password" required>
                    </div>
                    
                    <!-- Confirm password field -->
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">
                            <i class="fas fa-lock me-1"></i>Confirm Password
                        </label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                               placeholder="Re-enter your password" required>
                    </div>
                    
                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </div>
                </form>
                
                <hr class="my-4">
                
                <!-- Login link -->
                <div class="text-center">
                    <p class="mb-0">Already have an account? 
                        <a href="login.php" class="fw-bold text-decoration-none">
                            Login here <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>