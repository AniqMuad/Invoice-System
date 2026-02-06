<?php
require '../config/database.php';

if ($_POST) {
    $stmt = $pdo->prepare(
        "INSERT INTO customers (company_name, contact_person, phone, email)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([
        $_POST['company_name'],
        $_POST['contact_person'],
        $_POST['phone'],
        $_POST['email']
    ]);
    header("Location: customers.php");
}
?>

<form method="POST">
    <input name="company_name" placeholder="Company Name" required><br>
    <input name="contact_person" placeholder="Contact Person"><br>
    <input name="phone" placeholder="Phone"><br>
    <input name="email" placeholder="Email"><br>
    <button>Add</button>
</form>
