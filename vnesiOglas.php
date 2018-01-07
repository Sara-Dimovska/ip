<?php
include("connection.php");
include"header.php";

if(isset($_POST['vnesiOglas'])){



	$kategorija = $_POST['kategorija'];
	$tip_objekt = $_POST['tip_objekt'];

	switch($kategorija){
		case 'Издавање': $kategorija=1;break;
		case 'Продажба': $kategorija=2;break;
	}
	switch($tip_objekt){
		case 'Стан': $tip_objekt=1;break;
		case 'Спрат од куќа': $tip_objekt=2;break;
		case 'Куќа': $tip_objekt=3;break;
	}

	$grad = $_POST['grad'];
	$naslov = $_POST['naslov'];
	$opis = $_POST['opis'];
	$kvadratura = $_POST['kvadratura'];
	$enterier = $_POST['enterier'];

	switch($enterier){
		case 'наместен': $enterier=1;break;
		case 'делумно наместен': $enterier=2;break;
		case 'ненаместен': $enterier=3;break;
	}

	$brSobi = $_POST['brSobi'];
	$greenje = $_POST['greenje'];
	switch($greenje){
		case 'Нема': $greenje=1;break;
		case 'Централно': $greenje=2;break;
		case 'Струја': $greenje=3;break;
		case 'Дрва': $greenje=4;break;
		case 'Друго': $greenje=5;break;
	}

	$sprat = $_POST['sprat'];
	$vkupno_spratovi = $_POST['vkupno_spratovi'];

	$lift = $_POST['lift'];

	switch($lift){
		case 'Да': $lift=1;break;
		case 'Не': $lift=0;break;
	}
	$cena = $_POST['cena'];
	$tip_cena = $_POST['tip_cena'];
	$lokacija = $_POST['lokacija'];
	
	$objaven_na = date("Y.m.d");

	$korisnik = 1; 

	
	// prikazi_telefon tip_cena lokacija
	// vo bazata oglasi
	$sql = "INSERT INTO oglasi(tip_objekt_id,kategorija_id,korisnik_id,naslov,opis,kvadratura,broj_sobi,enterier_id,tip_greenje_id,sprat,vkupno_spratovi,lift,cena,tip_cena,lokacija,grad,objaven_na) 	
	VALUES('$tip_objekt','$kategorija','$korisnik','$naslov','$opis','$kvadratura','$brSobi','$enterier','$greenje','$sprat','$vkupno_spratovi','$lift','$cena','$tip_cena','$lokacija','$grad','$objaven_na')";

	$result = mysqli_query($conn,$sql);

	if($result){
		echo"okej";
	}

	$id_naVnesenOglas = mysqli_insert_id($conn);



	// za povekje sliki 
	$target_dir = "uploads/";
	for($i=0;$i<count($_FILES["prikaciSlika"]["name"]);$i++){

		$target_file = $target_dir . basename($_FILES["prikaciSlika"]["name"][$i]);

		// zemi ja ekstenzijata
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// validni ekstenzii
		$extensions_arr = array("jpg","jpeg","png","gif");

		// Check extension
		if( in_array($imageFileType,$extensions_arr) ){

			// vo bazata na sliki
			$sql = "INSERT INTO sliki(oglasID) VALUES('$id_naVnesenOglas')";
			mysqli_query($conn,$sql);
			$idSlika = mysqli_insert_id($conn); //zema go id-to na zapiso
			$vnesenaSlika = $idSlika.".".$imageFileType; // ime na slikata e id.extenzija
			$sql = "UPDATE sliki SET imeSlika = '$vnesenaSlika' WHERE id = '$idSlika'";
			mysqli_query($conn,$sql);


			// smesti go fajlot vo papkata uploads
			move_uploaded_file($_FILES['prikaciSlika']['tmp_name'][$i],$target_dir.$vnesenaSlika);

		}


	}

	mysqli_close($conn);
}
?>

<div class="container">

	<div class = "left">
		<table>
			<form method="post" action="vnesiOglas.php" enctype='multipart/form-data'>
				<tr>
					<td style="font-size:15px;margin:5px;">Изберете Категорија</td>
					<td>
						<select name="kategorija" class="selectpicker show-tick">
							<option value="" selected disabled>Категорија</option>
							<option value="Издавање">Издавање</option>
							<option value="Продажба">Продажба</option>
						</select>
					</td>

				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Недвижнина:</td>
					<td>
						<select name="tip_objekt" class="selectpicker show-tick">
							<option value="" selected disabled>Тип на објект</option>
							<option value="Стан">Стан</option>
							<option value="Спрат од куќа">Спрат од куќа</option>
							<option value="Куќа">Куќа</option>						
						</select>
					</td>

				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Град</td>
					<td>
						<select name="grad" class="selectpicker show-tick">
							<option value="" selected disabled>Изберете град</option>
							<option value="Скопје">Скопје</option>
							<option value="Штип">Штип</option>
							<option value="Битола">Битола</option>
							<option value="Прилеп">Прилеп</option>
							<option value="Охрид">Охрид</option>
							<option value="Струмица">Струмица</option>
							<option value="Свети Николе">Свети Николе</option>
							<option value="Кочани">Кочани</option>
							<option value="Берово">Берово</option>

						</select>
					</td>

				</tr>
				<tr>

					<td  style="font-size:15px;margin:5px;">Наслов на огласот:</td>
					<td><input type='text' name="naslov" class="form-control"></td>
				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Опис:</td>
					<td >

						<div class="form-group">
							<textarea class="form-control" name = 'opis' id="exampleFormControlTextarea1" rows="5"></textarea>
						</div>


				</tr>

				<tr >
					<td style="font-size:15px;margin:5px;" >Квадратура:</td>	
					<td ><input type='text' name="kvadratura" class="form-control"></td>	
					<td style="font-size:15px;margin:5px;">m<sup>2</sup></td>

				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">
						Ентриер:
					</td>
					<td>
						<select  name="enterier" class="selectpicker show-tick">
							<option value="" selected disabled>Изберете ентериер</option>
							<option value ="наместен" >наместен</option>
							<option value="делумно наместен">делумно наместен</option>
							<option value="ненаместен">ненаместен</option>

						</select>	
					</td>	
				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Соби:</td>
					<td>
						<select name="brSobi" class="selectpicker show-tick">
							<option value="" selected disabled>број на соби</option>
							<option value="1" >1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="над 9">над 9</option>

						</select>	
					</td>	
				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Греење:</td>
					<td>
						<select  name = 'greenje' class="selectpicker show-tick">
							<option value="" selected disabled>Тип на греење</option>
							<option value="Нема">Нема</option>
							<option value="Централно">Централно</option>
							<option value="Струја">Струја</option>
							<option value="Дрва" >Дрва</option>
							<option value="Друго">Друго</option>								
						</select>	
					</td>	
				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Спрат:</td>	
					<td ><input type='text'name="sprat" class="form-control"></td>	

				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Вкупно спратови:</td>	
					<td ><input type='text'name='vkupno_spratovi' class="form-control"></td>	

				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Адреса:</td>	
					<td ><input type='text'name='lokacija' class="form-control"></td>	

				</tr>		
				<tr>
					<td style="font-size:15px;margin:5px;">Лифт:</td>
					<td>
						<select name="lift" class="selectpicker show-tick">
							<option value="Да">Да</option>
							<option value="Не">Не</option>							
						</select>	
					</td>	
				</tr>
				<tr>
					<td  style="font-size:15px;margin:5px;">Цена:</td>	
					<td ><input type='text' name="cena" class="form-control"></td>
					<td>
						<select name="tip_cena" class="selectpicker show-tick">
							<option value="Евра">Евра</option>
							<option value="Денари">Денари</option>	
							<option value="По договор">По договор</option>						
						</select>	
					</td>		

				</tr>
				<tr>
					<td style="font-size:15px;margin:5px;">Прикачи слики:</td>	
					<td><input type="file" class="btn btn-default" name="prikaciSlika[]" multiple value="Прикачи"></td>	

				</tr>
				<tr >
					<td>
					
						<input type="submit" class="btn btn-default btn-success" name="vnesiOglas" value="Внеси го огласот">
					
					</td>
				</tr>
			</form>
		</table>

	</div>
</div>

</body>
<footer class="panel-footer">

</footer>
</html>


















