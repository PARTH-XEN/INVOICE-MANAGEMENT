<?php
include "db.php";
if(!isset($_SESSION['admin'])) header("Location: login.php");

$data = mysqli_query($conn,"SELECT * FROM invoices ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Invoices</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <span>Invoice System</span>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="add_product.php">Add Product</a>
        <a href="create_invoice.php">Create Invoice</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
<div class="card">
<h2>All Invoices</h2>

<table class="table">
<tr>
    <th>ID</th>
    <th>Customer</th>
    <th>Date</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['customer_name'] ?></td>
    <td><?= $row['invoice_date'] ?></td>
    <td>₹<?= $row['total'] ?></td>
    <td>
        <a class="btn-sm" href="print_invoice.php?id=<?= $row['id'] ?>">View / Print</a>
    </td>
</tr>
<?php } ?>

</table>
</div>
</div>

</body>
</html>
