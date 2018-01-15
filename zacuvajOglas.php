<?php  
	
	//if(isset($_SESSION['id_of_user'])){

	$userid = $_SESSION['id_of_user'];
	$id = $_SESSION['oglasID'];
echo $userid.$id;

	
/*
	$sql = "INSERT INTO zacuvani_ogasi(korisnicko_id,oglas_id) VALUES ('$userid','$id')";

	$result = mysqli_query($conn,$sql);

	if($result){
		echo"okej";
	}*/
 
?>