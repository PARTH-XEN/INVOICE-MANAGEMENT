<?php
include "db.php";
if(!isset($_SESSION['admin'])) header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
<span>Invoice System</span>
<div>
<a href="home.php">Invoices</a>
<a href="add_product.php">Add Product</a>
<a href="create_invoice.php">Create Invoice</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<h2>Dashboard</h2>
<p>Welcome Admin</p>
</div>

</body>
</html>
