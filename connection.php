<?php
if (!($conn = mysqli_connect("localhost", "root", "")))	
		die("Error!" .mysqli_connect_error());


	if (!(mysqli_select_db($conn,"izdavanje"))) 
		die("Error!" .mysqli_connect_error());
	
mysqli_set_charset($conn,"utf8");
?>