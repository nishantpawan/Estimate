<!DOCTYPE html>
<html>
<head>
	<title>Calculation Page</title>
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
<center>
<form name="f1" method="post">
	<table>
		<tr>
			<td>Product Type</td>
			<td>
				<SELECT  id="parent-1" name="ptype">
					<option selected>Select Options</option>
					<OPTION value="Wallpaper">Wallpaper</OPTION>
					<OPTION value="Blinds">Blinds</OPTION>
					<OPTION value="Curtains">Curtains</OPTION>
					<OPTION value="Flooring">Flooring</OPTION>
				</SELECT>
			</td>
		</tr>
		<tr>
			<td>Product SubType</td>
			<td>
				<SELECT id="child-1"name="stype" class="depdrop" data-depends="['parent-1']" data-url="/path/to/child_1_list.json">
					<OPTION>selcet</OPTION>
				</SELECT>
			</td>
		</tr>
			<tr>
			<td>Brand</td>
			<td><SELECT name="brand">
					<option selected>Select Options</option>
					<OPTION value="Wallpaper">Wallpaper</OPTION>
					<OPTION value="Blinds">Blinds</OPTION>
					<OPTION value="Curtains">Curtains</OPTION>
					<OPTION value="Flooring">Flooring</OPTION>
				</SELECT>
				</td>
		</tr>
			<tr>
			<td>Color</td>
			<td>
				<SELECT name="color">
					<option selected>Select Options</option>
					<OPTION value="Wallpaper">Wallpaper</OPTION>
					<OPTION value="Blinds">Blinds</OPTION>
					<OPTION value="Curtains">Curtains</OPTION>
					<OPTION value="Flooring">Flooring</OPTION>
				</SELECT>
			</td>
		</tr>
		<tr>
			<td>Length <sub>in inches</sub></td>
			<td><input type="text" name="length" required="Required"></td>
		</tr>
		<tr>
			<td>Width <sub>in inches</sub></td>
			<td><input type="text" name="width" required="Required"></td>
		</tr>
		<tr>
			<td>Rate</td>
			<td><input type="text" name="rate" required="Required" ></td>
		</tr>
		<tr>
			<td>Quantity</td>
			<td><input type="text" name="qty" required="Required" ></td>
		</tr>
		<tr>
			<td>Subtotal</td>
			<td><input type="text" name="stotal" required="Required" ></td>
		</tr>
		<tr>
			<td>VAT@14.5%</td>
			<td><input type="text" name="vat" required="Required" ></td>
		</tr>
		<tr>
			<td>Grand Total</td>
			<td><input type="text" name="gtotal" required="Required" ></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input class="btn" type="submit" name="submit" onclick="validate()" value="Generate Quote"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>
