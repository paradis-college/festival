<?php
// Include core functions
require_once 'includes/functions.php';

// Set page title
$title = 'Legacy Projects Archive';
include 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h2 class="mb-0">
                    <i class="fas fa-archive me-2"></i>Legacy Projects Archive
                </h2>
            </div>
            <div class="card-body">
                <div class="alert alert-primary mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Archive Information:</strong> This section contains references to previous editions of the Nikola Tesla Science Festival 
                    from our legacy websites. Projects are being migrated to this new platform.
                </div>

                <!-- Previous Website References -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border-success">
                            <div class="card-body">
                                <h5 class="card-title text-success">
                                    <i class="fas fa-flask me-2"></i>Main Archive
                                </h5>
                                <p class="card-text">
                                    The primary archive of Nikola Tesla Science Festival projects from previous years.
                                </p>
                                <a href="http://nikolateslasciencefestival.paradis-college.ro/" 
                                   target="_blank" 
                                   class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-external-link-alt me-1"></i>Visit Archive
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border-info">
                            <div class="card-body">
                                <h5 class="card-title text-info">
                                    <i class="fas fa-folder-open me-2"></i>Site Collection
                                </h5>
                                <p class="card-text">
                                    Additional project collections and documentation from festival editions.
                                </p>
                                <a href="http://nikolateslasciencefestival.paradis-college.ro/site" 
                                   target="_blank" 
                                   class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-external-link-alt me-1"></i>Visit Collection
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border-warning">
                            <div class="card-body">
                                <h5 class="card-title text-warning">
                                    <i class="fas fa-history me-2"></i>Old Site Archive
                                </h5>
                                <p class="card-text">
                                    Historical archive containing the earliest festival projects and documentation.
                                </p>
                                <a href="http://nikolateslasciencefestival.paradis-college.ro/site/oldSite" 
                                   target="_blank" 
                                   class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-external-link-alt me-1"></i>Visit Old Archive
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MechaByte Reference -->
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-robot me-2 text-primary"></i>Related Project: MechaByte
                        </h4>
                        <p class="card-text">
                            MechaByte is Paradis College's robotics and mechatronics program, showcasing advanced 
                            engineering projects and innovations from our students. Many of our science festival 
                            participants have also contributed to MechaByte projects.
                        </p>
                        <a href="https://mechabyte.paradis-college.ro" 
                           target="_blank" 
                           class="btn btn-primary">
                            <i class="fas fa-external-link-alt me-2"></i>Visit MechaByte
                        </a>
                        <p class="mt-3 mb-0 small text-muted">
                            <i class="fas fa-lightbulb me-1"></i>
                            MechaByte represents the cutting edge of robotics education at Paradis College, 
                            complementing the scientific research showcased in our festival.
                        </p>
                    </div>
                </div>

                <!-- Migration Status -->
                <div class="alert alert-warning">
                    <h5 class="alert-heading">
                        <i class="fas fa-tasks me-2"></i>Migration in Progress
                    </h5>
                    <p class="mb-0">
                        We are currently migrating projects from our legacy websites to this new platform. 
                        If you have projects from previous years that you'd like to see featured here, 
                        please contact the festival organizers or use the upload feature if you're a registered teacher.
                    </p>
                </div>

                <!-- Back Button -->
                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-success btn-lg">
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                    <a href="projects.php" class="btn btn-outline-success btn-lg">
                        <i class="fas fa-folder-open me-2"></i>Current Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
