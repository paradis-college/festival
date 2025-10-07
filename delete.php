<?php
require_once 'includes/functions.php';
requireLogin();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$project = getProject($id);

if (!$project) {
    header('Location: projects.php');
    exit();
}

// Check if user can delete this project
if ($_SESSION['user_id'] != $project['author_id'] && !isAdmin()) {
    header('Location: index.php?error=access_denied');
    exit();
}

if (deleteProject($id)) {
    header('Location: projects.php?success=delete');
} else {
    header('Location: project.php?id=' . $id . '&error=delete');
}
exit();
?>