<?php
// Database configuration - Using SQLite for easy setup
define('DB_FILE', __DIR__ . '/../festival.db');

try {
    $pdo = new PDO("sqlite:" . DB_FILE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create tables if they don't exist
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username VARCHAR(50) UNIQUE NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            role TEXT DEFAULT 'student' CHECK(role IN ('teacher', 'student', 'admin')),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
        
        CREATE TABLE IF NOT EXISTS projects (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title VARCHAR(200) NOT NULL,
            description TEXT,
            content TEXT NOT NULL,
            author_id INTEGER NOT NULL,
            year INTEGER NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
        );
        
        CREATE TABLE IF NOT EXISTS votes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            project_id INTEGER NOT NULL,
            vote_type TEXT DEFAULT 'up' CHECK(vote_type IN ('up', 'down')),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE (user_id, project_id),
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
        );
        
        CREATE TABLE IF NOT EXISTS comments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            project_id INTEGER NOT NULL,
            comment_text TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
        );
    ");
    
    // Check if we need to insert sample data
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $userCount = $stmt->fetchColumn();
    
    if ($userCount == 0) {
        // Insert sample users (password: admin123)
        $hashedPass = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $pdo->exec("
            INSERT INTO users (username, email, password, role) VALUES 
            ('admin', 'admin@festival.edu', '$hashedPass', 'admin'),
            ('teacher1', 'teacher1@festival.edu', '$hashedPass', 'teacher'),
            ('student1', 'student1@festival.edu', '$hashedPass', 'student')
        ");
        
        // Insert sample projects
        $pdo->exec("
            INSERT INTO projects (title, description, content, author_id, year) VALUES 
            ('Solar Panel Efficiency Study', 'Research on improving solar panel efficiency using different materials', '# Solar Panel Efficiency Study\n\nThis project explores various methods to improve solar panel efficiency through innovative material combinations and design approaches.\n\n## Abstract\nWe investigated the performance of different photovoltaic materials under various lighting conditions.\n\n## Results\nOur findings show a 15% improvement in efficiency when using our proposed material combination.', 2, 2023),
            ('Water Purification System', 'Developing a low-cost water purification system for rural areas', '# Water Purification System\n\nOur team developed an innovative water purification system using locally available materials.\n\n## Problem Statement\nMany rural communities lack access to clean drinking water.\n\n## Solution\nWe created a multi-stage filtration system that costs under $50 to build.', 2, 2022),
            ('AI in Education', 'Implementing AI tools to enhance learning experiences', '# AI in Education\n\nThis project demonstrates how artificial intelligence can be used to personalize learning experiences.\n\n## Technology Stack\n- Python\n- TensorFlow\n- Natural Language Processing\n\n## Impact\nOur AI tutor helped improve student test scores by an average of 20%.', 2, 2024),
            ('Renewable Energy Storage', 'Novel approach to storing renewable energy using thermal systems', '# Renewable Energy Storage\n\nExploring thermal storage solutions for renewable energy systems.\n\n## Innovation\nWe developed a phase-change material system that stores energy efficiently.', 2, 2023),
            ('Smart Agriculture Sensors', 'IoT-based sensor network for optimizing crop yields', '# Smart Agriculture Sensors\n\nUsing Internet of Things technology to help farmers optimize their crops.\n\n## Features\n- Real-time soil moisture monitoring\n- Automated irrigation control\n- Weather prediction integration', 2, 2024)
        ");
    }
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>