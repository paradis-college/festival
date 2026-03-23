<?php
/**
 * Unified Action Handler
 * Handles vote, comment, delete, and logout actions
 * Replaces: vote.php, comment.php, delete.php, logout.php
 */

require_once 'includes/functions.php';

// Get the action from URL or POST data
$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'vote':
        handleVote();
        break;
    
    case 'comment':
        handleComment();
        break;
    
    case 'delete':
        handleDelete();
        break;
    
    case 'logout':
        handleLogout();
        break;
    
    default:
        // Invalid action
        header('Location: index.php');
        exit();
}

/**
 * Handle voting on projects
 */
function handleVote() {
    requireLogin();
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: index.php');
        exit();
    }
    
    $project_id = intval($_POST['project_id']);
    $vote_action = isset($_POST['vote_action']) ? $_POST['vote_action'] : 'vote';
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';
    
    if ($vote_action === 'remove') {
        if (removeVote($_SESSION['user_id'], $project_id)) {
            header("Location: $redirect?success=vote");
        } else {
            header("Location: $redirect?error=vote");
        }
    } else {
        if (voteProject($_SESSION['user_id'], $project_id)) {
            header("Location: $redirect?success=vote");
        } else {
            header("Location: $redirect?error=already_voted");
        }
    }
    exit();
}

/**
 * Handle adding comments to projects
 */
function handleComment() {
    requireLogin();
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: projects.php');
        exit();
    }
    
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

/**
 * Handle project deletion
 */
function handleDelete() {
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
}

/**
 * Handle user logout
 */
function handleLogout() {
    logoutUser();
}

?>