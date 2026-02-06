<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // updated to match your login page
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; padding: 50px; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 10px; }
        a { text-decoration: none; color: blue; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<h2>Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['full_name']; ?>!</p>
<p>Role: <?php echo $_SESSION['role']; ?></p>

<ul>
    <li><a href="customers.php">Manage Customers</a></li>
    <li><a href="invoices.php">Manage Invoices</a></li>
    <li><a href="payment_add.php">Add Payment</a></li>
    <li><a href="../cron/status_check.php" target="_blank">Run Status Checker</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

</body>
</html>
