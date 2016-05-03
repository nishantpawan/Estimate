<!DOCTYPE html>
<?php session_start();

	$name=$_SESSION['username'];
	#echo "Hello! ".$name;

	include 'dbCon.php';

if(count($_POST)>0) {
	mysql_query("UPDATE lineitem set ptype='".$_POST['pptype']."', 
			brand='".$_POST['brand']."',
			color='".$_POST['color']."', 
			length='".$_POST['length']."', 
			width='".$_POST['width']."', 
			rate='".$_POST['rate']."', 
			areaOfwall='".$_POST['aofw']."', 
			noof_roll='".$_POST['nofr_roll']."',
			stichingType='".$_POST['stiching']."',
			sCost='".$_POST['stCost']."', 
			noof_panel='".$_POST['nop']."', 
			len_req='".$_POST['lenr']."',
			t_fabric='".$_POST['fabr']."',
			area='".$_POST['areas']."', 
			orientation='".$_POST['org']."', 
			subtotal='".$_POST['subtotal']."', 
			vat='".$_POST['vatCharge']."', 
			t_amount='".$_POST['gtotal']."' WHERE Id='".$_POST['Id']."'
			");
			//mysql_query($query);
	echo "<script>alert('Record Modified Successfully');</script>";
}


			$message = "Record Modified Successfully";

$result = mysql_query("SELECT * FROM `lineitem` WHERE Id='". $_GET['Id'] ."'");
$row= mysql_fetch_array($result);

?>
<html>
<head>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/header-basic-light.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

	<title>Quotation Generation</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">
	<script src="js/jquery-2.2.2.js" type="text/javascript"></script>
	<script src="js/jquery-2.2.2.min.js" type="text/javascript"></script>
	<script src="js/lineItem.js" type="text/javascript"></script>
	<script type="text/javascript" >
	$(document).ready(function(){
		$("#parent1").css("display","none");
        $("#parent2").css("display","none");

    	$(".pttype").click(function(){
    		if ($('#ptype').val() == "Wallpaper" ) {
        		$("#parent1").slideDown("fast"); //Slide Down Effect
        		wallpaper();
        	}
        	else {
            	$("#parent1").slideUp("fast");	//Slide Up Effect
        	}
    });
       $(".pttype").click(function(){
        if ($('#ptype').val() == "Curtains" ) {
        	$("#parent2").slideDown("fast"); //Slide Down Effect
        	curtains();
        }
        else {
            $("#parent2").slideUp("fast");	//Slide Up Effect
        }
    });
       $(".pttype").click(function(){
        if ($('#ptype').val() == "Flooring" ) {
        	$("#parent3").slideDown("fast"); //Slide Down Effect
        	//checkPtype();
        	flooring();
        }
        else {
            $("#parent3").slideUp("fast");	//Slide Up Effect
        }
    });
});
	</script>
</head>
<body>

<header class="header-basic-light">

	<div class="header-limiter">

		<h1><a href="index.php">Happy<span>monk</span></a></h1>

		<nav>
			<a href="lineItem.php" class="selected">Add Item</a>
			<a href="Quotation.php" >Quotation</a>
			<a href="Index.php">Login</a>
			<a href="Register.php">Register Now</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>
<div class="container-fluid">
<center>
<h3>Item List</h3>
<form name="baseform" method="post" action="" ><!--onsubmit="return validate()"-->
		<table class="table-bordered" cellpadding="10" cellpadding="10" border="0">
		<input type="hidden" value="<?php echo $row['Id'];?>" name="Id"></input>
			<tr>
				<th>Product Type</th>
				<td>
					<select id="ptype" class="pttype" name="pptype">
						<option selected>Select Options</option>
						<option value="Wallpaper">Wallpaper</option>
						<option value="Curtains">Curtains</option>
						<option value="Flooring">Flooring</option>
						<option value="Blinds">Blinds</option>
						<option value="Accessories">Accessories</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Brand</th>
				<td><input type="text" value="<?php echo $row['brand'];?>" name="brand" required="required"></td>
			</tr>
			<tr>
				<th>Color</th>
				<td><input type="text" name="color"value="<?php echo $row['color'];?>" required="required"></td>
			</tr>
			<tr>
				<th>Orientation</td>
				<td>
					<select name="org" value="<?php echo $row['orientation'];?>">
						<option value="not applicable"selected>Not Applicable</option>
						<option value="portrait">Portrait</option>
						<option value="landscape">Landscape</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Length</th>
				<td><input type="text" value="<?php echo $row['length'];?>" name="length" required="required"></td>
			</tr>
			<tr>
				<th>Width</th>
				<td><input  type="text" value="<?php echo $row['width'];?>" name="width" required="required" ></td>
			</tr>
			<tr>
				<th>Rate</th>
				<td><input type="text" name="rate" value="<?php echo $row['rate'] ?>" required="required"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					
<!--Wallpaper-->

					<table id="parent1">
						<tr>

							<td><input type="text" value="57" name="wra"></td>
							<td>Wallpaper Roll Area </td>
						</tr>
						<tr>

							<td><input type="text" value="<?php echo $row[''];?>" name="aofw"readonly="readonly"></td>
							<td>Area of Wall </td>
						</tr>
						<tr>

							<td><input type="text"value="<?php echo $row['brand'];?>" name="nofr_roll"readonly="readonly"></td>
							<td>No of Roll</td>
						</tr>
					</table>


<!--Curtains form -->

					<table id="parent2">

						<tr>

							<td>
								<select name="stiching" onchange="curtains()">
									<option selected>Not Applicable</option>
									<option value="eyelet">Eyelet</option>
									<option value="panel">Panel</option>
								</select>
							</td>
							<td>Stiching Type</td>
						</tr>
						<tr>

							<td><input type="text"  value="<?php echo $row['sCost'];?>" name="stCost"readonly="readonly"></td>
							<td>Stiching Cost</td>
						</tr>
						<tr>

							<td><input type="text" value="<?php echo $row['noof_panel'];?>" name="nop"readonly="readonly"></td>
							<td>no of Panel </td>
						</tr>
						<tr>

							<td><input type="text" value="<?php echo $row['len_req'];?>"  name="lenr"readonly="readonly"></td>
							<td>Length Required</td>
						</tr>
						<tr>

							<td><input type="text" value="<?php echo $row['t_fabric'];?>"  name="fabr"readonly="readonly"></td>
							<td>Total Fabric</td>
						</tr>
					</table>

<!--FLOORING FORM-->

					<table id="parent3">
					
						<tr>

							<td><input type="text" value="<?php echo $row['area'];?>" name="areas"></td>
							<td>Area in<sub>sq.</sub> </td>
						</tr>
						
					</table>

				</td>

			</tr>
			<tr>
				<td>Subtotal</td>
				<td><input type="text" value="<?php echo $row['subtotal'];?>" name="subtotal" readonly="readonly"></td>
			</tr>
			<tr>
				<td>VAT@
					<select name="vat"  onchange="checkPtype()">
						<option value="0.145"selected>14.5%</option>
						<option value="0.055">5.5%</option>
					</select>
				</td>

				<td><input type="text" value="<?php echo $row['vat'];?>" name="vatCharge"readonly="readonly"></td>
			</tr>
			<tr>
				<td>Grand Total</td>
				<td><input type="text" name="gtotal" value="<?php echo $row['t_amount'];?>" readonly="readonly"></td>
			</tr>

			<tr>
				<td><a href="Quotation.php">Back to Quotation</a></td>
				<td><input class="btn" name="submit" type="submit" value="Save">
				</td>
			</tr>
		</table>
	
</form>
</center>
</div>
</body>
</html>
