<!DOCTYPE html>
<?php session_start();

	$name=$_SESSION['username'];
	//echo "Hello! ".$name;
?>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Item Quotation</title>


	<link rel="stylesheet" href="../assets/header-basic-light.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css">
	<style type="text/css">
		table{
			width: 500px;
			border: 2px solid #dfdfdf;
			}
		table .t1{
			background-color: #F4D6BC;
		}
		table .t2{
			background-color: #F8E4CC;
		}
		table tr td{
			padding: 15px;
		}


	</style>
</head>
<body>

<?php

	include '../dbCon.php';
    $query="SELECT * FROM `LineItem` where Id='". $_GET["Id"] ."'";

    // Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($query) or die(mysql_error());

	?>
	<?php
	// Loop the recordset $rs
	if($row = mysql_fetch_array($rs)) {
		?>
		<header class="header-basic-light">

	<div class="header-limiter">

		<h1><a href="index.php">Happy<span>monk</span></a></h1>
		<nav>
			<a href="../Invoice.php">New Invoice</a>
			<a href="../Quotation" class="selected">Quotation</a>
			<a href="../Index.php">Login</a>
			<a href="../Register.php">Register Now</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>
<div class="container" style="padding-top:25px ">
<center>
	<table>
			<tr class="t1">
				<td><b>Product Type</b></th>
				<td><?php echo $row['ptype'];?></td>
			</tr>
			<tr class="t2">
				<td><b>Brand</b></th>
				<td><?php echo $row['brand'];?></td>
			</tr>
			<tr class="t1">
				<td><b>Color</b></th>
				<td><?php echo $row['color'];?></td>
			</tr>
			<tr class="t2">
				<td><b>Length</th>
				<td><?php echo $row['length'];?> "</td>
			</tr>
			<tr class="t1">
				<td><b>Width</b></th>
				<td><?php echo $row['width'];?></td>
			</tr>
			<tr class="t2">
				<td><b>Rate</b></th>
				<td><?php echo $row['rate'];?></td>
			</tr>
			<tr class="t1">
				<td><b>Area of wall</b></th>
				<td><?php if($row['areaOfwall']!=0){echo $row['areaOfwall'];}else{echo "Not Applicable";};?>
				</td>
			</tr>
			<tr class="t2">
				<td><b>No of Roll</b></th>
				<td><?php if($row['noof_roll']!=0){echo $row['noof_roll'];}else{echo "Not Applicable";};
				?>
				</td>
			</tr>
			<tr class="t1">
				<td><b>Stiching Type</b></th>
				<td><?php echo $row['stichingType'];?>
				</td>
			</tr>
			<tr class="t2">
				<td><b>Stiching Cost</b></th>
				<td><?php if($row['sCost']!=0 || $row['sCost']=null ){echo $row['sCost'];}else{echo "Not Applicable";};
				?>
				</td>
			</tr>
			<tr class="t1">
				<td><b>No of Panel</b></th>
				<td><?php echo $row['noof_panel'];?>
				</td>
			</tr>
			<tr class="t2">
				<td><b>Length Required</b></th>
				<td><?php if($row['len_req']!=0 || $row['len_req']=null ){echo $row['len_req'];}else{echo "Not Applicable";};
				?>
				</td>
			</tr>
			<tr class="t1">
				<td><b>Total Fabric</b></th>
				<td><?php echo $row['stichingType'];?>
				</td>
			</tr>
			<tr class="t2">
				<td><b>Area</b></th>
				<td><?php if($row['area']!=0 ){echo $row['area'];}else{echo "Not Applicable";};
				?>
				</td>
			</tr>
			<tr class="t2">
				<td><b>Orientation</b></th>
				<td><?php if($row['orientation']!=null ){echo $row['orientation'];}else{echo "Not Available";};
				?>
				</td>
			</tr>
		</table>
		<?php } ?>
		<a href="../Quotation.php">Back to Quotation</a>
				</div>
		
	</center>
</body>
</html>
