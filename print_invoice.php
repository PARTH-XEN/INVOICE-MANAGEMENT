<?php
include "db.php";
if(!isset($_SESSION['admin'])) header("Location: login.php");

$id = $_GET['id'];

$inv = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM invoices WHERE id=$id")
);

$items = mysqli_query(
    $conn,"SELECT * FROM invoice_items WHERE invoice_id=$id"
);
?>
<!DOCTYPE html>
<html>
<head>
<title>Invoice</title>
<link rel="stylesheet" href="style.css">
</head>
<body onload="window.print()">

<div class="invoice-box">

<h1><?= $inv['company_name'] ?></h1>

<p>
<b>Customer:</b> <?= $inv['customer_name'] ?><br>
<b>Phone:</b> <?= $inv['phone'] ?><br>
<b>Email:</b> <?= $inv['email'] ?><br>
<b>Date:</b> <?= $inv['invoice_date'] ?>
</p>

<table class="table">
<tr>
<th>Product</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
</tr>

<?php while($r=mysqli_fetch_assoc($items)){ ?>
<tr>
<td><?= $r['product'] ?></td>
<td><?= $r['qty'] ?></td>
<td>₹<?= $r['price'] ?></td>
<td>₹<?= $r['qty'] * $r['price'] ?></td>
</tr>
<?php } ?>

</table>

<h2>Grand Total: ₹<?= $inv['total'] ?></h2>

</div>

</body>
</html>
