<?php
if (!($conn = mysqli_connect("localhost", "root", "")))	 {
	    echo "error1";
		die("Error!" .mysqli_connect_error());
}

	if (!(mysqli_select_db($conn,"izdavanje"))) {
		echo "error2";
		die("Error!" .mysqli_connect_error());
	}
mysqli_set_charset($conn,"utf8");
?>