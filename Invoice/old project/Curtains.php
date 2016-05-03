<!DOCTYPE html>
<?php session_start();

	$name=$_SESSION['username'];
?>
<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$length = $width = $rate = "";
$lengthErr = $widthErr = $rateErr = "";

if(isset($_POST['submit'])){
	$ptype=$_POST['ptype'];
	$brand=$_POST['brand'];
	$color=$_POST['color'];
	$length=$_POST['length'];
	$width=$_POST['width'];
	$rate=$_POST['rate'];
	$nop=$_POST['nop'];
	$lenr=$_POST['lenr'];
	$fabr=$_POST['fabr'];
	$tAmount=$_POST['tAmount'];
	$sEye=$_POST['sEye'];
	$sPanel=$_POST['sPanel'];
	$username=$_POST['username'];

 	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'product';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname); 
$query="insert into Curtains (ptype, brand,color, length, width, rate, noof_panel, len_req,t_fabric, t_amount, s_eyelet,s_panel,username) values('$ptype', '$brand','$color', '$length', '$width', '$rate', '$nop', '$lenr','$fabr','$tAmount','$sEye', '$sPanel','$username')";

if(mysql_query($query)){
	
	header("location: retrieveCurtains.php");
}
else{
	echo "<script>alert('Error!!! while generating the quotation...');".mysql_error();
}

}
 ?>

<html>
<head>
	<title>Curtains</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">
	<script src="Calculation.js"></script>
	<style type="text/css">
	body{
		margin: 30px;
	}
	</style>
</head>
<body>
<form name="c1" method="post" action="Curtains.php">
<table>
<input type="hidden" value="<?php echo $name;?>" name="username"> 
	<tr>
		<td>Product Type</td>
		<td><input type="text" value="Curtains" readonly="readonly" name="ptype"></td>
	</tr>
	<tr>
		<td>Brand</td>
		<td><input type="text" name="brand" required="required" >
		</td>
	</tr>
	<tr>
		<td>Color</td>
		<td><input type="text" name="color" required="required" >
		</td>
	</tr><tr>
		<td>Length</td>
		<td><input type="text" name="length" required="required" >
		</td>
	</tr>
	<tr>
		<td>Width</td>
		<td><input type="text" name="width" required="required" >
		</td>
	</tr>
	<tr>
		<td>Stiching Type</td>
		<td><select name="stiching">
			<option selected>Select Option</option>
			<option value="eyelet">Eyelet</option>
			<option value="panel">Panel</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Rate</td>
		<td><input type="text" name="rate" required="required" onkeydown="curtainCalc()" >
		</td>
	</tr>
	<tr>
		<td>Stiching Cost</td>
		<td><input type="text" name="st1"></td>
	</tr>
	<tr>
		<td>No of Panels</td>
		<td><input type="text" name="nop" required="required" >
		</td>
	</tr>
	<tr>
		<td>Length Required</td>
		<td><input type="text" name="lenr" required="required" >
		</td>
	</tr>
	<tr>
		<td>Total Fabric Required</td>
		<td><input type="text" name="fabr" required="required" >
		</td>
	</tr>
	<tr>
		<td>Subtotal</td>
		<td><input type="text" name="stotal" required="required" >
		</td>
	</tr>
	<tr>
		<td>VAT@5.5%</td>
		<td><input type="text" name="vat" required="required" >
		</td>
	</tr>
	<tr>
		<td>Total Amount</td>
		<td><input type="text" name="tAmount" required="required" >
		</td>
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" class="btn" name="submit" value="Generate Quote">
		</td>
	</tr>
</table>
</form>
</body>
</html>