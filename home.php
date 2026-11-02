<?php
include "db.php";
if (!isset($_SESSION['admin'])) header("Location: login.php");
$data = mysqli_query($conn, "SELECT * FROM invoices ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>



<div class="container">
    <h2>Invoices</h2>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['customer_name'] ?></td>
            <td><?= $row['invoice_date'] ?></td>
            <td>₹<?= $row['total'] ?></td>
            <td><a href="print_invoice.php?id=<?= $row['id'] ?>" class="btn-sm">Print</a></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
