<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=invoice_system", "root", "");
    echo "PDO MySQL works!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
    