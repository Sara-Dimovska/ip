<?php 
include"connection.php";
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class = "header"></div>

		<div class = "navigacija">		
		</div>
		<div class = "container">


			<?php
			{
				if(isset($_GET['id'])){
					//echo $_GET['id'];
					$id = $_GET["id"];
					$sql = mysqli_query($conn,"SELECT * 
					FROM oglasi 
					INNER JOIN sliki ON (oglasi.ID = sliki.oglasID)
					WHERE oglasi.ID = '$id'") or die("Error");
					
					if($row = mysqli_fetch_array($sql)){
						//echo " <div class = 'oglasSlika_golema'> <img //src='sara/".$row['link']."' /></div>";
						echo "<h2>".$row['naslov']."</h2>";
						echo "<h3>Опис</h3><p>".$row['opis']."</p";
						echo "<hr> <h3>Локација</h3><p>".$row['lokacija']."</p";
						
					}
					
					
				}
			}
			?>

		</div>

	</body>
</html>