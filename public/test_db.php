<?php
require __DIR__ . '/../config/database.php';
echo "DB connection works!";
$host = "localhost";
$db   = "invoice_system";
$user = "root";
$pass = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass
    );
    echo "DB connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
