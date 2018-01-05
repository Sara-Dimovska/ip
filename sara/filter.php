<?php 
include"connection.php";
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body style="background-color:silver;">
		<div class = "header">
			<button class = "login">Логирај се</button>
			<button class = "login">Објави оглас</button>

		</div>

		<div class = "navigacija">		
		</div>
		<div class = "container">
			<?php
			{
				$zapisi_naStrana = 3;
				$sql = "SELECT * FROM oglasi";
				$result = mysqli_query($conn,$sql);
				$vkupnoZapisi = mysqli_num_rows($result);

				$brojStrani = ceil($vkupnoZapisi/$zapisi_naStrana);


				//tekovna strana
				if(!isset($_GET['strana'])){
					$strana = 1;
				}else{
					$strana = $_GET['strana'];
				}

				$stranaOD = ($strana-1)*$zapisi_naStrana;

				
				if(iss)
				$sql = mysqli_query($conn,"SELECT oglasi.ID AS id ,oglasi.naslov,oglasi.cena, sliki.link
				FROM oglasi 
				INNER JOIN sliki ON (oglasi.ID = sliki.oglasID) LIMIT ".$stranaOD.','.$zapisi_naStrana) or die("Error");	

				while ($row = mysqli_fetch_array($sql)){
					echo "<div class ='oglas'> 
					<a href='oglas.php?id=".$row['id']. "'>";

					echo "<div class ='oglasSlika_mala'>";
					echo "<img src='sara/".$row['link']."' />";
					echo "</div>";
					echo "</a>";
					echo $row['naslov'];
					echo "<br>Цена: " . $row['cena'];
					//echo "<br>шифра: " . $row['id'];


					echo "</div>";
				} 

				echo"<br>";
				for($strana = 1;$strana <= $brojStrani;$strana++){
					echo '<a href = "index.php?strana='.$strana.'">'.$strana.'</a>';
				}



				//mkdir("testing");

			}
			?>
		</div>

	</body>
</html>