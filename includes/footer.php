    </div>

    <!-- Footer section - bottom of every page -->
    <footer class="text-light mt-5 py-4">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left side - branding -->
                <div class="col-md-6 mb-3 mb-md-0">
                    <h5 class="mb-2">
                        <i class="fas fa-graduation-cap me-2"></i>International Science Festival
                    </h5>
                    <p class="mb-1">Showcasing innovative science projects from students worldwide.</p>
                    <p class="mb-0 small">Building tomorrow's scientists and innovators today.</p>
                </div>
                <!-- Right side - links and copyright -->
                <div class="col-md-6 text-md-end">
                    <div class="mb-2">
                        <a href="index.php" class="text-light text-decoration-none me-3">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                        <a href="projects.php" class="text-light text-decoration-none me-3">
                            <i class="fas fa-folder-open me-1"></i>Projects
                        </a>
                        <?php if (isLoggedIn()): ?>
                        <a href="logout.php" class="text-light text-decoration-none">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                        <?php else: ?>
                        <a href="login.php" class="text-light text-decoration-none">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                        <?php endif; ?>
                    </div>
                    <p class="mb-1">&copy; <?php echo date('Y'); ?> International Science Festival</p>
                    <small class="text-light opacity-75">
                        <i class="fas fa-globe me-1"></i>Empowering Education Worldwide
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript libraries for interactive features -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>