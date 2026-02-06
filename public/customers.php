<?php
session_start();
require '../config/database.php';

$stmt = $pdo->query("SELECT * FROM customers ORDER BY created_at DESC");
$customers = $stmt->fetchAll();
?>

<h2>Customers</h2>
<a href="customer_add.php">Add Customer</a>
<table border="1">
<tr>
    <th>Company</th>
    <th>Status</th>
</tr>
<?php foreach ($customers as $c): ?>
<tr>
    <td><?= $c['company_name'] ?></td>
    <td><?= $c['status'] ?></td>
</tr>
<?php endforeach; ?>
</table>
