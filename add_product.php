<?php
include "db.php";
if(!isset($_SESSION['admin'])) header("Location: login.php");

if(isset($_POST['save'])){
    $n=$_POST['name'];
    $p=$_POST['price'];
    mysqli_query($conn,"INSERT INTO products(product_name,price) VALUES('$n','$p')");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
<a href="dashboard.php">Dashboard</a>
<a href="create_invoice.php">Create Invoice</a>
<a href="logout.php">Logout</a>
</div>

<div class="container">
<div class="card">
<h2>Add Product</h2>
<form method="post">
<input type="text" name="name" placeholder="Product Name" required>
<input type="number" name="price" placeholder="Price" required>
<button class="btn" name="save">Save</button>
</form>
</div>
</div>

</body>
</html>
