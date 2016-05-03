<!DOCTYPE html>
<?php session_start()?>
<html>
<head>
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/header-basic-light.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">
</head>
<body>

<header class="header-basic-light">

	<div class="header-limiter">

		<h1><a href="index.php">Happy<span>monk</span></a></h1>

		<nav>
			<a href="Invoice.php">New Invoice</a>
			<a href="Quotation.php" >Quotation</a>
			<a href="Index.php"class="selected">Login</a>
			<a href="Register.php">Register Now</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>

<center>
<h3>Login Here</h3>
<form action="index.php" method="post">
	<table cellpadding="5">
		<tr>
			<td>User Id</td>
			<td><input type="text" name="username" required="required"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" required="required"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input class="btn" type="submit" value="Login"></td>
		</tr>
	</table>
</form>
<p>or <a href="register.php">Register Now</p>
</center>
</body>
</html>
<?php
if($_POST)
{
	$password = $_POST['password'];
	$username = $_POST['username'];
	
	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'product';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname);


$username = mysql_real_escape_string($_POST['username']);
$userpassword = mysql_real_escape_string($_POST['password']);
$query="select name from customer where username='$username' and password='$password'";
$result = mysql_query($query) or die ("Unable to verify user because " . mysql_error());

$count = mysql_num_rows($result);


if($count==1){
	echo "<script>alert('You are successfully Login')</script>";
	$_SESSION['username'] = $_POST['username'];
	header("location:Invoice.php");
}
else{
echo "<script>alert('User Id or Password is incorrect.')</script>";
	exit();
}

}
?>