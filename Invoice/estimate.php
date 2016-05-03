<!DOCTYPE html>
<?php /*session_start();
	$name=$_SESSION['username'];*/
	//echo "Hello! ".$name;
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Item Quotation</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">
	<script src="js/jquery-2.2.2.js" type="text/javascript"></script>
	<script src="js/jquery-2.2.2.min.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="js/lineitem.js"></script>

	</head>
<body>

<form>
<table class="">
	<thead>
		<tr>
			<th>Product Category</th>
			<th>Length</th>
			<th>Width</th>
			<th>Rate</th>
			<th>Subtotal</th>
			<th>VAT</th>
			<th>Total</th>
			<th><input type="button" value="+" id="add" class="btn btn-primary"></th>
		</tr>
		</thead>
		<tbody class="detail">
			<tr>
			<td>
				<select id="ptype" class="pttype" name="pptype[]">
					<option selected>Select Options</option>
					<option value="Wallpaper">Wallpaper</option>
					<option value="Curtains">Curtains</option>
					<option value="Flooring">Flooring</option>
					<option value="Blinds">Blinds</option>
					<option value="Accessories">Accessories</option>
				</select>
			</td>
			<td><input class="smallInput" type="text" id="" name="length[]"></td>
			<td><input class="smallInput" type="text" id="" name="width[]"></td>
			<td><input class="smallInput" type="text" id="" name="rate[]"></td>
			<td><input class="input-lg" type="text" id="stotal" name="subtotal[]"></td>
			<td><select name="vat[]" onchange="checkPtype()">
						<option value="0.145"selected>14.5%</option>
						<option value="0.055">5.5%</option>
					</select>
					<input type="text" name="vatCharge"readonly="readonly">
			</td>
			<td><input type="text" id="gtotal" name="Total[]"></td>
			<td>&nbsp;</td>
			
		</tr>
		<tr>	
				<td colspan="2">
					
<!--Wallpaper-->

					<table id="parent1">
						<tr>

							<td><input type="text" value="57" name="wra"></td>
							<td>Wallpaper Roll Area </td>
						</tr>
						<tr>

							<td><input type="text" name="aofw"readonly="readonly"></td>
							<td>Area of Wall </td>
						</tr>
						<tr>

							<td><input type="text" name="nofr_roll"readonly="readonly"></td>
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

							<td><input type="text"  name="stCost"readonly="readonly"></td>
							<td>Stiching Cost</td>
						</tr>
						<tr>

							<td><input type="text"  name="nop"readonly="readonly"></td>
							<td>no of Panel </td>
						</tr>
						<tr>

							<td><input type="text"  name="lenr"readonly="readonly"></td>
							<td>Length Required</td>
						</tr>
						<tr>

							<td><input type="text"  name="fabr"readonly="readonly"></td>
							<td>Total Fabric</td>
						</tr>
					</table>

<!--FLOORING FORM-->

					<table id="parent3">
					
						<tr>

							<td><input type="text" name="areas"></td>
							<td>Area in<sub>sq.</sub> </td>
						</tr>
					</table>
				</td>
			</tr>
</tbody>
</table>
</form>


<script type="text/javascript">
	$(document).ready(function(){
		$("#add").click(function(){
				addnew_row();
			});

		$('body').delegate('.remove','click',function(){
			$(this).parent().parent().remove(); 
			
		});
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
	function addnew_row() {
		var tr='<tr>'+
			'<td><select id="ptype" class="pttype" name="pptype[]">					<option selected>Select Options</option>					<option value="Wallpaper">Wallpaper</option><option value="Curtains">Curtains</option>					<option value="Flooring">Flooring</option>					<option value="Blinds">Blinds</option>					<option value="Accessories">Accessories</option></select></td>'+
			'<td><input class="smallInput" type="text" id="" name="length[]"></td>'+
			'<td><input class="smallInput" type="text" id="" name="width[]"></td>'+
			'<td><input class="smallInput" type="text" id="" name="rate[]"></td>'+
			'<td><input type="text" id="stotal" name="subtotal[]"></td>'+
			'<td><input type="text" id="vat" name="vat[]"></td>'+
			'<td><input type="text" id="gtotal" name="Total[]"></td>'+
			'<td><a href="#" class="remove">Delete</a></td>'+
			'<tr>'+
				'<td colspan="2">'+
					
'<!--Wallpaper-->'+

					'<table id="parent1">'+
						'<tr>'+

							'<td><input type="text" value="57" name="wra"></td>'+
							'<td>Wallpaper Roll Area </td>'+
						'</tr>'+
						'<tr>'+

							'<td><input type="text" name="aofw"readonly="readonly"></td>'+
							'<td>Area of Wall </td>'+
						'</tr>'+ 
						'<tr>'+

							'<td><input type="text" name="nofr_roll"readonly="readonly"></td>'+
							'<td> No of Roll</td>'+
						'</tr>'+
					'</table>'+


'<!--Curtains form -->'+

					'<table id="parent2">'+

						'<tr>'+
							'<td><select name="stiching" onchange="curtains()"><option selected>Not Applicable</option><option value="eyelet">Eyelet</option><option value="panel">Panel</option></select></td>'+
							'<td>Stiching Type</td>'+
						'</tr>'+
						'<tr>'+

							'<td><input type="text"  name="stCost"readonly="readonly"></td>'+
							'<td>Stiching Cost</td>'+
						'</tr>'+
						'<tr>'+

							'<td><input type="text"  name="nop"readonly="readonly"></td>'+
							'<td>no of Panel </td>'+
						'</tr>'+
						'<tr>'+

							'<td><input type="text"  name="lenr"readonly="readonly"></td>'+
							'<td>Length Required</td>'+
						'</tr>'+
						'<tr>'+

							'<td><input type="text"  name="fabr"readonly="readonly"></td>'+
							'<td>Total Fabric</td>'+
						'</tr>'+
					'</table>'+
					'<!--FLOORING FORM-->'+

					'<table id="parent3">'+
					
						'<tr>'+

							'<td><input type="text" name="areas"></td>'+
							'<td>Area in<sub>sq.</sub> </td>'+
						'</tr>'+
						
					'</table>'+

				'</td>'+

			'</tr>'+
		'</tr>';
		$('.detail').append(tr);

		
	}
	</script>

</body>
</html>

		