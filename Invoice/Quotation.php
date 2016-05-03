<!DOCTYPE html>

<?php session_start();

	$name=$_SESSION['username'];
	//echo "Hello! ".$name;
	$InvoiceNo=$_SESSION['InvoiceNo'];
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Item Quotation</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/header-basic-light.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">
	<script src="js/jquery-2.2.2.js" type="text/javascript"></script>
	<script src="js/jquery-2.2.2.min.js" type="text/javascript"></script>
	
	
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
<div class="container-fluid">
<h1>Item Quotation</h1>
<?php
	include 'dbCon.php';
	$InvoiceNo=$_SESSION['InvoiceNo'];
    $query="SELECT * FROM `LineItem` where InvoiceNo='$InvoiceNo'";
    
    // Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($query);
	if($rs==false)
	{
		mysql_error();
	}else{
	
	?>
	<form method="post" name="q1">
	<table class="table table-bordered">
			<tr>
				<th>Invoice No</th>
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
				<td><?php echo $InvoiceNo;?></td>
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

$query1="SELECT subtotal, vat FROM `LineItem` where InvoiceNo='$InvoiceNo'";
	$rs1 = mysql_query($query1);
	$stotal=0;$vat=0;
	while ($row = mysql_fetch_array($rs1)) {
		$stotal=$stotal+$row['subtotal'];
		$vat=$vat+$row['vat'];
	}
	
	$gtotal=$stotal+$vat;

	?>
	<tr>
		<td colspan="7"><span style="float:right;padding-right: 50px">Subtotal</span></td>
		<td colspan="2" ><input type="text"value="<?php echo $stotal;?>"name="gsubtotal"readonly="readonly"></td>
	</tr>
	<tr>
		<td colspan="7"><span style="float:right;padding-right: 50px">VAT</span></td>
		<td colspan="2" ><input type="text" name="gvat"value="<?php echo $vat;?>"readonly="readonly"></td>
	</tr>
	<tr>
		<td colspan="7"><span style="float:right;padding-right: 50px">Grand Total</span></td>
		<td colspan="2" ><input type="text" name="gttotal"value="<?php echo $gtotal;?>" readonly="readonly"></td>
	</tr>
	
	<tr>
		<td colspan="9"><center ><a style="padding-right: 10px;" href="lineItem.php">Add New Item</a>
		<span style="float: right; padding-right: 200px;">
		<input name="submit" type="submit" class="btn btn-success" value="Save" >
		</span>
		</center>
	</tr>
</table>
</form>
<a href="LineItem.php">Add New Item</a>

</div>

</body>
</html>
		
<?php
	if(isset($_POST['submit'])){
	$gsstotal=$_POST['gsubtotal'];
	$gvat=$_POST['gvat'];
	$gttotal=$_POST['gttotal'];


	$query2="SELECT Id FROM `Customer` where username='$name'";
     // Execute the query (the recordset $rs contains the result)
    $result1=mysql_query($query2) or die(mysql_error());

    $cust=mysql_fetch_assoc($result1)or die(mysql_error());
    $custId='Id';
	$date=date('Y-m-d');
	echo $date;
	

	$query="insert into `invoice`(InvoiceNo, InvoiceDate, custId, subtotal, vat, discount,gtotal) value('$InvoiceNo','$date','$cust[$custId]','$gsstotal', '$gvat',0,'$gttotal')"; 


if(mysql_query($query)){
	//echo "<script>alert('data inserted...');</script>";
	header("location: Invoice.php");
}
else{
	echo "<script>alert('Error!!! while generating the quotation...');".mysql_error();
}
}
?>