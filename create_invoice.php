<?php
include "db.php";
if(!isset($_SESSION['admin'])) header("Location: login.php");

$products = mysqli_query($conn,"SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
<title>Create Invoice</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
<a href="dashboard.php">Dashboard</a>
<a href="view_invoices.php">View Invoices</a>
<a href="logout.php">Logout</a>
</div>

<div class="container">
<form action="save_invoice.php" method="post" class="card">

<h2>Create Invoice</h2>

<input type="text" name="company" placeholder="Company Name" required>
<input type="text" name="customer" placeholder="Customer Name" required>
<input type="text" name="phone" placeholder="Phone Number" required>
<input type="email" name="email" placeholder="Email" required>

<table class="table">
<tr>
<th>Product</th>
<th>Qty</th>
<th>Price</th>
</tr>

<?php for($i=0;$i<5;$i++){ ?>
<tr>
<td>
<select name="product[]" onchange="setPrice(this)">
<option value="">Select Product</option>
<?php
mysqli_data_seek($products,0);
while($p=mysqli_fetch_assoc($products)){
echo "<option value='{$p['product_name']}' data-price='{$p['price']}'>
{$p['product_name']}
</option>";
}
?>
</select>
</td>
<td><input type="number" name="qty[]"></td>
<td><input type="number" name="price[]"></td>
</tr>
<?php } ?>

</table>

<button class="btn">Save & Print</button>
</form>
</div>

<script>
function setPrice(sel){
let price = sel.options[sel.selectedIndex].dataset.price;
sel.closest("tr").querySelector('input[name="price[]"]').value = price || '';
}
</script>

</body>
</html>
