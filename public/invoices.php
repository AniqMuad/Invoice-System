<?php
require '../config/database.php';

$sql = "SELECT i.*, c.company_name
        FROM invoices i
        JOIN customers c ON i.customer_id = c.customer_id";
$invoices = $pdo->query($sql)->fetchAll();
?>

<h2>Invoices</h2>
<table border="1">
<tr>
    <th>Invoice</th>
    <th>Customer</th>
    <th>Total</th>
    <th>Status</th>
</tr>
<?php foreach ($invoices as $i): ?>
<tr>
    <td><?= $i['invoice_number'] ?></td>
    <td><?= $i['company_name'] ?></td>
    <td><?= $i['total_amount'] ?></td>
    <td><?= $i['status'] ?></td>
</tr>
<?php endforeach; ?>
</table>

