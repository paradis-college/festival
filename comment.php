<?php
// This file handles adding comments to projects
require_once 'includes/functions.php';

// Only logged-in users can comment
requireLogin();

// Check if this is a POST request (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $project_id = intval($_POST['project_id']);
    $comment_text = trim($_POST['comment_text']);
    
    // Make sure we have both required fields
    if ($project_id && !empty($comment_text)) {
        // Add the comment to the database
        if (addComment($_SESSION['user_id'], $project_id, $comment_text)) {
            // Success - redirect back to the project page
            header('Location: project.php?id=' . $project_id . '&success=comment');
            exit();
        } else {
            // Error adding comment
            header('Location: project.php?id=' . $project_id . '&error=comment');
            exit();
        }
    } else {
        // Missing required data
        header('Location: project.php?id=' . $project_id . '&error=comment');
        exit();
    }
}

// If not a POST request, redirect to projects page
header('Location: projects.php');
exit();
?>
