<?php 
include"connection.php";
include"header.php";
?>

		<div class="container">

			<div class = "left">
				<?php
				{

					$zapisi_naStrana =10;
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


					if(isset($_POST['filter'])){
						$kategorija = $_POST['kategorija'];
						$tip_objekt = $_POST['tip_objekti'];
						$enterier = $_POST['enterier'];
						$grad = $_POST['grad'];
						$cenaOd = $_POST['cenaOd'];
						$cenaDo = $_POST['cenaDo'];
						$brSobi = $_POST['brSobi'];


						$sql = mysqli_query($conn,"SELECT *
FROM oglasi INNER JOIN sliki ON (oglasi.oglasID = sliki.oglasID),kategorija,tip_objekt,enterier	

WHERE oglasi.kategorija_id = kategorija.kategorija_id AND oglasi.tip_objekt_id = tip_objekt.tip_objekt_id AND oglasi.enterier_id = enterier.enterier_id AND

kategorija.ime_kategorija = '$kategorija' AND tip_objekt.ime_objekt='$tip_objekt' AND enterier.ime_enterier = '$enterier' AND oglasi.grad = '$grad' AND oglasi.cena BETWEEN '$cenaOd' AND '$cenaDo' AND oglasi.broj_sobi >= '$brSobi'
				LIMIT ".$stranaOD.','.$zapisi_naStrana) or die("Error");	

						while ($row = mysqli_fetch_array($sql)){
							echo "<div class ='oglas'> 
					<a href='oglas.php?id=".$row['id']. "'>";

							echo "<div class ='oglasSlika_mala'>";
							echo "<img src='sara/".$row['imeSlika']."' />";
							echo "</div>";
							echo "</a>";
							echo $row['naslov'];
												
							echo "Цена:" .$row['cena']."€";
							//if($row['tip_cena'] == 'Евра')
								//echo "€";
							

							echo "</div>";
						} 

					}
					else {
						$sql = mysqli_query($conn,"SELECT *
				FROM oglasi 
				INNER JOIN sliki ON (oglasi.oglasID = sliki.oglasID) LIMIT ".$stranaOD.','.$zapisi_naStrana) or die("Error");	

						while ($row = mysqli_fetch_array($sql)){
							echo "<div class ='oglas'> 
					<a href='oglas.php?id=".$row['id']. "'>";

							echo "<div class ='oglasSlika_mala'>";
							echo "<img src='sara/".$row['imeSlika']."' />";
							echo "</div>";
							echo "</a>";
							echo $row['naslov'];
							echo' <button type="button" class="btn btn-default" disabled style="background-color:yellow; ">';					
							echo $row['cena'];
							echo '</button>';

							echo "</div>";
						} 

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
						<option value="<?= $row['ime_kategorija'] ?>"><?= $row['ime_kategorija'] ?></option>
						<?php 
						} //end while				
						?>
					</select>	
					<p class="text-muted" style="font-size:15px;margin:5px;"> Тип на недвижнина:</p>
					<select name="tip_objekti" name="kategorija" class="selectpicker show-tick">			

						<?php
						$result=mysqli_query($conn,"SELECT * FROM tip_objekt");
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
						<option value="<?= $row['ime_enterier'] ?>"><?= $row['ime_enterier'] ?></option>
						<?php 
						} //end while				
						?>
					</select>	
					<p class="text-muted" style="font-size:15px;margin:5px;"> Град:</p>
					<select name="grad" name="kategorija" class="selectpicker show-tick">			

						<?php
						$result=mysqli_query($conn,"SELECT  DISTINCT grad FROM oglasi");
						while($row = mysqli_fetch_array($result)){


						?>
						<option value="<?= $row['grad'] ?>"><?= $row['grad'] ?></option>
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