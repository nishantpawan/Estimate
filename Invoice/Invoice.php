<!DOCTYPE html>
<?php
session_start();
$InvoiceNo=mt_rand(10000, 99999);

$_SESSION['InvoiceNo']=$InvoiceNo;
?>
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
			<a href="Invoice.php" class="seleted">New Invoice</a>
			<a href="Quotation" class="selected">Quotation</a>
			<a href="Index.php">Login</a>
			<a href="Register.php">Register Now</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>
<div class="container-fluid">
	<h1>Invoice List</h1>
	<?php
	

	$name=$_SESSION['username'];
	//echo "Hello! ".$name;
	$InvoiceNo=$_SESSION['InvoiceNo'];
	include 'dbCon.php';

	$query2="SELECT Id FROM `Customer` where username='$name'";
     // Execute the query (the recordset $rs contains the result)
    $result1=mysql_query($query2) or die(mysql_error());

    $cust=mysql_fetch_assoc($result1)or die(mysql_error());
    $custId='Id';


    $query="SELECT * FROM `Invoice` where custId='$cust[$custId]'";
    
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
				<th>Created Date</th>
				<th>Subtotal</th>
				<th>VAT</th>
				<th>Discount</th>
				<th>Total</th>
				<td>Action</td>
			</tr>
			<?php
	// Loop the recordset $rs
	while($row = mysql_fetch_array($rs)) {
		?>
			<tr>
				<td><?php echo $row['InvoiceNo'];?></td>
				<td><?php echo $row['InvoiceDate'];?></td>
				<td><?php echo $row['subtotal'];?>"</td>
				<td><?php echo $row['vat'];?>"</td>
				<td><?php echo $row['discount'];?></td>
				<td><?php echo $row['gtotal'];?></td>
				<td><a href="ItemList.php?Id=<?php echo $row["InvoiceNo"]; ?>">View</a> | <a href="deleteInvoice.php?Id=<?php echo $row["InvoiceNo"]; ?>">Delete</a> </td>
			</tr>
			

		
<?php }
}?>

<a href="LineItem.php">New Invoice</a>
</div>
</body>
</html>