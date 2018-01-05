<?php 
include"connection.php";
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

	</head>
	<body style="background-color:#DCDCDC;">



		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Brand</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<form class="navbar-form navbar-right">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>

						<button type="submit" class="btn btn-default btn-primary">Пребарај</button>
						<button type="button" class="btn btn-default  navbar-btn">Најави се</button>
					</form>


				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>


		<div class="banner">



		</div>



		<div class ="container">



			<div class = "left">
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
					/*
				if(isset($_POST['baraj'])){
					$kategorija = $_POST['kategorija'];
					$tip_objekt = $_POST['tip_objekt'];
					$enterier = $_POST['enterier'];
					$grad = $_POST['grad'];
					$cenaOd = $_POST['cenaOd'];
					$cenaDo = $_POST['cenaDo'];
					$brSobi = $_POST['brSobi'];

					echo $kategorija . $tip_objekt.$enterier.$grad.$cenaDo.$cenaOd.$brSobi;
					echo 'sara';
				}*/

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
						$stringCut = substr($row['naslov'], 0, 40);
						echo $stringCut;
						echo' <button type="button" class="btn btn-default" disabled style="background-color:yellow; ">';					
						echo $row['cena'];
						echo '</button>';

						echo "</div>";
					} 

				}					
				?>

				<div class="text-center" >

					<ul class="pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<?php
						for($strana = 1;$strana <= $brojStrani;$strana++){
							echo ' <li><a href = "index.php?strana='.$strana.'">'.$strana.'</a></li>';
						}
						//mkdir("testing");					
						?>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>

				</div>




			</div>
			<div class="right ">
				<p class="text-primary text-center" style="font-size:20px;">Пребарување</p>
				<form action="index.php" method="post">
					<p class="text-muted" style="font-size:15px;margin:5px;"> Категорија:</p>

					<select name="kategorija" class="selectpicker show-tick">			

						<?php
						$result=mysqli_query($conn,"SELECT * FROM kategorija");
						while($row = mysqli_fetch_array($result)){


						?>
						<option value="<?= $row['ime'] ?>"><?= $row['ime'] ?></option>
						<?php 
						} //end while				
						?>
					</select>	
					<p class="text-muted" style="font-size:15px;margin:5px;"> Тип на недвижнина:</p>
					<select name="tip_objekti" name="kategorija" class="selectpicker show-tick">			

						<?php
						$result=mysqli_query($conn,"SELECT * FROM tip_objekti");
						while($row = mysqli_fetch_array($result)){


						?>
						<option value="<?= $row['ime_objekt'] ?>"><?= $row['ime_objekt'] ?></option>
						<?php 
						} //end while				
						?>
					</select>	
					<p class="text-muted" style="font-size:15px;margin:5px;"> Ентериер:</p>
					<select name="enterier" name="kategorija" class="selectpicker show-tick">			

						<?php
						$result=mysqli_query($conn,"SELECT * FROM enterier");
						while($row = mysqli_fetch_array($result)){


						?>
						<option value="<?= $row['ime'] ?>"><?= $row['ime'] ?></option>
						<?php 
						} //end while				
						?>
					</select>	
					<p class="text-muted" style="font-size:15px;margin:5px;"> Град:</p>
					<select name="grad" name="kategorija" class="selectpicker show-tick">			

						<?php
						$result=mysqli_query($conn,"SELECT lokacija FROM oglasi");
						while($row = mysqli_fetch_array($result)){


						?>
						<option value="<?= $row['lokacija'] ?>"><?= $row['lokacija'] ?></option>
						<?php 
						} //end while				
						?>
					</select>	

					<p class="text-muted" style="font-size:15px;margin:5px;">Цена:</p>


					<input type='text' size="4" placeholder="Од" name="cenaOd" class="form-control">
					<input type='text' size="4" placeholder="До" name="cenaDo" class="form-control">

					<p class="text-muted" style="font-size:15px;margin:5px;">Број на соби:</p>
					<input type='text'plaseholder="Внесете број на соби" name="brSobi" class="form-control"><br>

					<input type="submit" value="Барај" name="filter" class="btn btn-default btn-success">

				</form>
			</div>
		</div>

	</body>
	<footer class="panel-footer">

	</footer>
</html>