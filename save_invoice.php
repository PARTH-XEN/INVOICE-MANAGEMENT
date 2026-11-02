<?php
include "db.php";
if(!isset($_SESSION['admin'])) header("Location: login.php");

$company  = $_POST['company'];
$customer = $_POST['customer'];
$phone    = $_POST['phone'];
$email    = $_POST['email'];

$p = $_POST['product'];
$q = $_POST['qty'];
$r = $_POST['price'];

$total = 0;
$items = [];

for($i=0;$i<count($p);$i++){
    if($p[$i]!="" && $q[$i]>0 && $r[$i]>0){
        $total += $q[$i] * $r[$i];
        $items[] = [$p[$i], $q[$i], $r[$i]];
    }
}

mysqli_query($conn,"
INSERT INTO invoices
(company_name, customer_name, phone, email, invoice_date, total)
VALUES
('$company','$customer','$phone','$email',CURDATE(),'$total')
");

$invoice_id = mysqli_insert_id($conn);

foreach($items as $it){
mysqli_query($conn,"
INSERT INTO invoice_items (invoice_id, product, qty, price)
VALUES ('$invoice_id','$it[0]','$it[1]','$it[2]')
");
}

header("Location: print_invoice.php?id=$invoice_id");
