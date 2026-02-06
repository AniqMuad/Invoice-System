<?php
require __DIR__ . '/../config/database.php';

// 1️⃣ Block customers
$pdo->exec("
    UPDATE customers c
    SET status = 'blocked'
    WHERE EXISTS (
        SELECT 1 FROM invoices i
        WHERE i.customer_id = c.customer_id
        AND i.status != 'paid'
        AND i.due_date < DATE_SUB(CURDATE(), INTERVAL 90 DAY)
    )
");

// 2️⃣ Inactive customers
$pdo->exec("
    UPDATE customers
    SET status = 'inactive'
    WHERE customer_id NOT IN (
        SELECT DISTINCT customer_id
        FROM invoices
        WHERE invoice_date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
    )
    AND status != 'blocked'
");

// 3️⃣ Active customers
$pdo->exec("
    UPDATE customers
    SET status = 'active'
    WHERE customer_id IN (
        SELECT DISTINCT customer_id
        FROM invoices
        WHERE invoice_date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
    )
    AND status != 'blocked'
");

echo "Customer statuses updated successfully.";
