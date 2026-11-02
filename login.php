<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="center-page">

<div class="login-card">
<h2>Admin Login</h2>

<form method="post">
<input type="text" name="user" placeholder="Username" required>
<input type="password" name="pass" placeholder="Password" required>
<button class="btn" name="login">Login</button>
</form>

<?php
if(isset($_POST['login'])){
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $q=mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q)>0){
        $_SESSION['admin']=$u;
        header("Location: dashboard.php");
    } else {
        echo "<p class='error'>Invalid Login</p>";
    }
}
?>
</div>
</body>
</html>
