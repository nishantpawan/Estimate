<!DOCTYPE html>
<?php session_start();

	$name=$_SESSION['username'];
	echo "Hello! ".$name;
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
<h3>Wallpaper</h3>
<?php
$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'product';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname); 
    $query="SELECT * FROM `WALLPAPER` where username='$name'";
    
    // Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($query);
	
	?>

	<table class="table table-bordered">
			<tr>
				<th>Product Type</th>
				<th>Brand</th>
				<th>Color</th>
				<th>Length</th>
				<th>Width</th>
				<th>Wallpaper roll area</th>
				<th>Rate</th>
				<th>No of Roll</th>
				<th>Area of Wall</th>
				<th>Subtotal</th>
			</tr>
			<?php
	// Loop the recordset $rs
	while($row = mysql_fetch_array($rs)) {
		?>
			<tr>
				<td><?php echo $row['ptype'];?></td>
				<td><?php echo $row['brand'];?></td>
				<td><?php echo $row['color'];?></td>
				<td><?php echo $row['length'];?> "</td>
				<td><?php echo $row['width'];?></td>
				<td><?php echo $row['wra'];?></td>
				<td><?php echo $row['rate'];?></td>
				<td><?php echo $row['aofw'];?></td>
				<td><?php echo $row['nof_roll'];?></td>
				<td><b>Rs. <?php echo $row['stotal'];?></b></td>
			</tr>
		
<?php }?>
<?php
$query1="SELECT stotal, vat FROM `WALLPAPER`";
	$rs1 = mysql_query($query1);
	$total=0;$vat=0;
	while ($row = mysql_fetch_array($rs1)) {
		$total=$total+$row['stotal'];
		$vat=$vat+$row['vat'];

	}
	#$vat=$total*(0.145);
	$gtotal=$total+$vat;

	?>
	<tr>
		<td colspan="9">Total</td>
		<td colspan="1" ><b><?php echo $total;?></b></td>
	</tr>
	<tr>
		<td colspan="9">VAT@14.5%</td>
		<td colspan="1" ><b><?php echo $vat;?></b></td>
	</tr>
	<tr>
		<td colspan="9">Grand Total</td>
		<td colspan="1" ><b><?php echo $gtotal;?></b></td>
	</tr>


</table>
</body>
</html>
		