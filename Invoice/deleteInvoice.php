<?php
include 'dbcon.php';
mysql_query("DELETE FROM Invoice WHERE InvoiceNo='" . $_GET["Id"] . "'");
mysql_query("DELETE FROM LineItem WHERE InvoiceNo='" . $_GET["Id"] . "'");

	header("Location:Invoice.php");
?>