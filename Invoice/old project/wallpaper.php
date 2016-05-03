<!DOCTYPE html>
<?php session_start();

	$name=$_SESSION['username'];
?>
<p>Hello!!!<?php echo $name;?>
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
	$wra=$_POST['wra'];
	$rate=$_POST['rate'];
	$aofw=$_POST['aofw'];
	$nofr=$_POST['nofr'];
	$stotal=$_POST['stotal'];
	$vat=$_POST['vat'];
	$tvalue=$_POST['tvalue'];
	$username=$_POST['username'];

 	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'product';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname); 
$query="insert into wallpaper (ptype, brand,color, length, width, wra, rate, aofw, nof_roll,stotal,vat,t_amount, username ) values('$ptype', '$brand','$color', '$length', '$width', '$wra', '$rate', '$aofw', '$nofr','$stotal','$vat','$tvalue','$username')";

if(mysql_query($query)){
	
	header("location: retrieveWall.php");
}
else{
	echo "<script>alert('Error!!! while generating the quotation...');</script>";
}

}
 ?>
<html>
<head>
	<title>Wallpaper</title>
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
<form name="w1" action="wallpaper.php" method="post">
<table>
	<input type="hidden" name="username"value="<?php echo $name;?>" />
	<tr>
		<td>Product Type</td>
		<td><input type="text" value="Wallpaper" readonly="readonly" name="ptype"></td>
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
		<td><input type="text" name="length" required="required">*<?php echo $lengthErr;?>
		</td>
	</tr>
	<tr>
		<td>Width</td>
		<td><input type="text" name="width" required="required" >*<?php echo $widthErr;?>
		</td>
	</tr>
	<tr>
		<td>Wallpaper Roll Area</td>
		<td><select name="wra">
			
			<option value="57" selected>57</option>
			<option value="58">58</option>
			<option value="59">59</option>
		</select>

		</td>
	</tr>

	<tr>
		<td>Rate</td>
		<td><input type="text" name="rate" required="required" onkeydown="calcWall()" >*<?php echo $rateErr;?>
		</td>
	</tr>
	<tr>
		<td>Area of Wall</td>
		<td><input type="text" name="aofw" required="required" >
		</td>
	</tr>
	<tr>
		<td>No of Rolls</td>
		<td><input type="text" name="nofr" required="required" >
		</td>
	</tr>
	<tr>
		<td>Subtotal</td>
		<td><input type="text" name="stotal" required="required"></td>
	</tr>
	<tr>
		<td>VAT @14.5%</td>
		<td><input type="text" name="vat" required="required" >
		</td>
	</tr>
	
	<tr>
		<td>Total Amount</td>
		<td><input type="text" name="tvalue" required="required" >
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






