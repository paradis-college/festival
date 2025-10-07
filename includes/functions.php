<?php
session_start();
require_once 'config/database.php';

// Authentication functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isTeacher() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'teacher';
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

function requireTeacher() {
    requireLogin();
    if (!isTeacher() && !isAdmin()) {
        header('Location: index.php?error=access_denied');
        exit();
    }
}

// User functions
function loginUser($username, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT id, username, email, password, role FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        return true;
    }
    return false;
}

function registerUser($username, $email, $password, $role = 'student') {
    global $pdo;
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$username, $email, $hashedPassword, $role]);
    } catch(PDOException $e) {
        return false;
    }
}

function logoutUser() {
    session_destroy();
    header('Location: index.php');
    exit();
}

// Project functions
function getProjects($year = null, $limit = null) {
    global $pdo;
    $sql = "SELECT p.*, u.username AS author_name, 
        (SELECT COUNT(*) FROM votes WHERE votes.project_id = p.id) AS vote_count
        FROM projects p
        LEFT JOIN users u ON p.author_id = u.id";
    $params = [];
    if ($year) {
        $sql .= " WHERE p.year = ?";
        $params[] = $year;
    }
    $sql .= " ORDER BY p.id DESC";
    if ($limit) {
        // Ensure $limit is an integer to avoid SQL injection
        $sql .= " LIMIT " . intval($limit);
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getProject($id) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT p.*, u.username as author_name, 
                          COUNT(v.id) as vote_count
                          FROM projects p 
                          JOIN users u ON p.author_id = u.id 
                          LEFT JOIN votes v ON p.id = v.project_id
                          WHERE p.id = ?
                          GROUP BY p.id");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function createProject($title, $description, $content, $author_id, $year) {
    global $pdo;
    
    $stmt = $pdo->prepare("INSERT INTO projects (title, description, content, author_id, year) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$title, $description, $content, $author_id, $year]);
}

function updateProject($id, $title, $description, $content, $year) {
    global $pdo;
    
    $stmt = $pdo->prepare("UPDATE projects SET title = ?, description = ?, content = ?, year = ? WHERE id = ?");
    return $stmt->execute([$title, $description, $content, $year, $id]);
}

function deleteProject($id) {
    global $pdo;
    
    $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
    return $stmt->execute([$id]);
}

// Voting functions
function hasUserVoted($user_id, $project_id) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT id FROM votes WHERE user_id = ? AND project_id = ?");
    $stmt->execute([$user_id, $project_id]);
    return $stmt->fetch() !== false;
}

function voteProject($user_id, $project_id, $vote_type = 'up') {
    global $pdo;
    
    if (hasUserVoted($user_id, $project_id)) {
        return false; // User already voted
    }
    
    $stmt = $pdo->prepare("INSERT INTO votes (user_id, project_id, vote_type) VALUES (?, ?, ?)");
    return $stmt->execute([$user_id, $project_id, $vote_type]);
}

function removeVote($user_id, $project_id) {
    global $pdo;
    
    $stmt = $pdo->prepare("DELETE FROM votes WHERE user_id = ? AND project_id = ?");
    return $stmt->execute([$user_id, $project_id]);
}

// Utility functions
function parseMarkdown($content) {
    // Simple markdown parsing - convert basic markdown to HTML
    $content = htmlspecialchars($content);
    
    // Headers
    $content = preg_replace('/^# (.+)$/m', '<h1>$1</h1>', $content);
    $content = preg_replace('/^## (.+)$/m', '<h2>$1</h2>', $content);
    $content = preg_replace('/^### (.+)$/m', '<h3>$1</h3>', $content);
    
    // Bold and italic
    $content = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $content);
    $content = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $content);
    
    // Line breaks
    $content = nl2br($content);
    
    return $content;
}

function getYears() {
    global $pdo;
    
    $stmt = $pdo->query("SELECT DISTINCT year FROM projects ORDER BY year DESC");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}
?>