<?php
require '../config/database.php';

if ($_POST) {
    $invoice_id = $_POST['invoice_id'];
    $amount_paid = $_POST['amount_paid'];
    $payment_date = $_POST['payment_date'];

    // 1️⃣ Insert payment
    $stmt = $pdo->prepare(
        "INSERT INTO payments (invoice_id, amount_paid, payment_date)
         VALUES (?, ?, ?)"
    );
    $stmt->execute([$invoice_id, $amount_paid, $payment_date]);

    // 2️⃣ Recalculate invoice status
    // Get total invoice amount
    $stmt = $pdo->prepare("SELECT total_amount FROM invoices WHERE invoice_id = ?");
    $stmt->execute([$invoice_id]);
    $invoice = $stmt->fetch();
    $total_amount = $invoice['total_amount'];

    // Get total paid for this invoice
    $stmt = $pdo->prepare("SELECT SUM(amount_paid) AS total_paid FROM payments WHERE invoice_id = ?");
    $stmt->execute([$invoice_id]);
    $paid = $stmt->fetchColumn();

    // Decide invoice status
    if ($paid >= $total_amount) {
        $status = 'paid';
    } elseif ($paid > 0) {
        $status = 'partial';
    } else {
        $status = 'unpaid';
    }

    // Update invoice status
    $stmt = $pdo->prepare("UPDATE invoices SET status = ? WHERE invoice_id = ?");
    $stmt->execute([$status, $invoice_id]);

    header("Location: invoices.php");
    exit;
}
?>

<form method="POST">
    <input name="invoice_id" placeholder="Invoice ID" required><br>
    <input name="amount_paid" placeholder="Amount Paid" type="number" step="0.01" required><br>
    <input name="payment_date" placeholder="Payment Date (YYYY-MM-DD)" required><br>
    <button>Add Payment</button>
</form>
