<?php
$conn = mysqli_connect("localhost", "root", "", "invoice_system");
if (!$conn) {
    die("DB Connection Failed");
}
session_start();
?>
