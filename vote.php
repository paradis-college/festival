<?php
require_once 'includes/functions.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $project_id = intval($_POST['project_id']);
    $action = isset($_POST['action']) ? $_POST['action'] : 'vote';
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';
    
    if ($action === 'remove') {
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

// Redirect to home if accessed directly
header('Location: index.php');
exit();
?>