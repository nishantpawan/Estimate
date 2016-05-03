<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/header-basic-light.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">
</head>
<body>
<header class="header-basic-light">

	<div class="header-limiter">

		<h1><a href="index.php">Happy<span>monk</span></a></h1>
		<nav>
			<a href="lineItem.php">Add Item</a>
			<a href="Quotation" class="selected">Quotation</a>
			<a href="Index.php">Login</a>
			<a href="Register.php">Register Now</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>
<?php
	include 'dbCon.php';
	//$username=$_SESSION['username'];
	//$inv=$_GET['']
    $query="SELECT * FROM `LineItem` where InvoiceNo='".$_GET['Id']."'";
    
    // Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($query);
	if($rs==false)
	{
		mysql_error();
	}else{
	
	?>
	<div class="container-fluid" style="padding-top: 20px;">
	<div>
		<p><b>Invoice No: #<?php echo $_GET['Id'];?></b></p>
		<p><b>Invoice Date: 
		<?php $query4="SELECT InvoiceDate FROM `Invoice` where InvoiceNo='".$_GET['Id']."'";
		$result2=mysql_query($query4) or die(mysql_error());
    	if($InvoiceDate=mysql_fetch_assoc($result2))
    		{
    			echo $InvoiceDate['InvoiceDate'];
    		}

    	

    ?>
		</b></p>
	</div>

	<table class="table table-bordered">
			<tr>
				<th>Product Type</th>
				<th>Description</th>
				<th>Length</th>
				<th>Width</th>
				<th>Rate</th>
				<th>Subtotal</th>
				<th>VAT</th>
				<th>Total</th>
				<td>Action</td>
			</tr>
			<?php
	// Loop the recordset $rs
	while($row = mysql_fetch_array($rs)) {
		?>
			<tr>
				<td><?php echo $row['ptype'];?></td>
				<td><b>Brand:</b> <?php echo $row['brand'];?>,
				    <b>Color:</b> <?php echo $row['color'];?></td>
				<td><?php echo $row['length'];?>"</td>
				<td><?php echo $row['width'];?>"</td>
				<td><?php echo $row['rate'];?></td>
				<td><?php echo $row['subtotal'];?></td>
				<td><?php echo $row['vat'];?></td>
				<td><?php echo $row['t_amount'];?></td>
				<td><a href="producttype/wallpaper.php?Id=<?php echo $row["Id"]; ?>">View</a> | <a href="deleteItem.php?Id=<?php echo $row["Id"]; ?>">Delete</a> | <a href="editItem.php?Id=<?php echo $row["Id"]; ?>">Edit</a> </td>
			</tr>
			

		
<?php }
}?>
<?php
#calculate the subtotal, vat and Grand Total

$query1="SELECT subtotal, vat FROM `LineItem` where InvoiceNo='".$_GET['Id']."'";
	$rs1 = mysql_query($query1);
	$stotal=0;$vat=0;
	while ($row1 = mysql_fetch_array($rs1)) {
		$stotal=$stotal+$row1['subtotal'];
		$vat=$vat+$row1['vat'];
	}
	
	$gtotal=$stotal+$vat;

	?>
	<tr>
		<td colspan="7"><span style="float:right;padding-right: 50px">Subtotal</span></td>
		<td colspan="2" ><?php echo $stotal;?></td>
	</tr>
	<tr>
		<td colspan="7"><span style="float:right;padding-right: 50px">VAT</span></td>
		<td colspan="2" ><?php echo $vat;?></td>
	</tr>
	<tr>
		<td colspan="7"><span style="float:right;padding-right: 50px">Grand Total</span></td>
		<td colspan="2" ><?php echo $gtotal;?></td>
	</tr>
	
	
</table>
</div>


</body>
</html>