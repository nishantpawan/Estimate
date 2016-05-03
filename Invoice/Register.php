<!DOCTYPE html>
<?php
if($_POST){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	
	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'product';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname);

$username = mysql_real_escape_string($_POST['username']);
$userCheck="select * from customer where username='$username'";
$result = mysql_query($userCheck) or die ("Unable to verify user because " . mysql_error());
$count = mysql_num_rows($result);
if($count>0)
{
	echo "<script>alert('username alreary exist.');</script>";
}else{
$query="insert into customer(name, address,city, username, password) values('$name','$address','$city','$username','$password')";

if(mysql_query($query)){
	echo "<script>alert('data successfully inserted.');</script>";
	header("location:index.php");
}
else{
echo "<script>alert('Data not inserted.')</script>";
}
}
}
?>
<html>
<head>
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/header-basic-light.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<title>Register Here</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">
	<script type="text/javascript">
	function checkP() {
		
	var password=document.f1.password.value;
	var cpassword=document.f1.cpassword.value;
	if(password !=cpassword)
	{
		alert('password does not match');
		document.f1.password.value="";
		document.f1.cpassword.value="";
		

	}}
</script>
</head>
<body>

<header class="header-basic-light">

	<div class="header-limiter">

		<h1><a href="index.php">Happy<span>monk</span></a></h1>

		<nav>
			<a href="lineItem.php">Add Item</a>
			<a href="Quotation.php" >Quotation</a>
			<a href="Index.php">Login</a>
			<a href="Register.php" class="selected">Register Now</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>

<center>
<h1>Register</h1>
<form action="Register.php" method="post" name="f1">
	<table cellpadding="5">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" required="required"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address" required="required"></td>
		</tr>
		
		<tr>
			<td>User Name</td>
			<td><input type="text" name="username" required="required"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" required="required"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" name="cpassword" required="required"></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" onkeydown="checkP()" required="required"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input class="btn" type="submit" value="submit"></td>
		</tr>
	</table>
</form>
<p>or <a href="index.php">Login Here.</p>
</center>

</body>
</html>
