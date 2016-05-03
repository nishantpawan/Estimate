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
<h3>Curtains</h3>
<?php
$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'product';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname); 
    $query="SELECT * FROM `CURTAINS` where username='$name'";
    // Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($query);?>
	// Loop the recordset $rs
	
<table class="table table-bordered">
<tr>
	<th>Product Id</th>
	<th>Product Type</th>
	<th>Brand</th>
	<th>Color</th>
	<th>Length</th>
	<th>Width</th>
	<th>Rate</th>
	<th>No of Panel</th>
	<th>Length Required</th>
	<th>Total Fabric</th>
	<th>Stiching</th>
	<th></th>
</tr>

	<?php while($row = mysql_fetch_array($rs)) {

		?>
		<table class="table table-bordered">
		<tr>
				<td></td>
				<td><?php echo $row['Id'];?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $row['ptype'];?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $row['brand'];?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $row['color'];?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $row['length'];?> "</td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $row['width'];?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $row['rate'];?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $row['noof_panel'];?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $row['len_req'];?></td>
			</tr>
			<tr>
				<td>Total Fabric</td>
				<td><?php echo $row['len_req'];?></td>
			</tr>
			<tr>
				<td>Stiching Type</td>
				<td><?php echo $row['s_eyelet'];?></td>
			</tr>
			<tr>
				<td>Stiching Cost</td>
				<td><?php echo $row['s_panel'];?></td>
			</tr>
			<tr>
				<td><b>Total Amount</b></td>
				<td><b>Rs. <?php echo $row['t_amount'];?></b></td>
			</tr>

		</table>
<?php }?>
</body>
</html>
		