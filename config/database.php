<?php
$host = "localhost";        // Usually localhost in XAMPP
$db   = "invoice_system";   // Make sure database name is exact
$user = "root";             // Default XAMPP MySQL user
$pass = "";                 // Default XAMPP MySQL password is empty

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    // Optional: uncomment to test connection
    // echo "Database connected successfully!";
} catch (PDOException $e) {
    // Show full error for debugging
    die("Database connection failed: " . $e->getMessage());
}
