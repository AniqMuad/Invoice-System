<?php
require __DIR__ . '/../config/database.php';

// Create admin user
$password = password_hash('1234567890', PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (full_name, email, password_hash, role) VALUES (?, ?, ?, ?)");
$stmt->execute(['Admin User', 'admin@example.com', $password, 'admin']);

echo "Admin user created successfully!";
