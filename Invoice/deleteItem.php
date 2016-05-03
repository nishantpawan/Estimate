<?php
include 'dbcon.php';
mysql_query("DELETE FROM LineItem WHERE Id='" . $_GET["Id"] . "'");
header("Location:quotation.php");

?>