<?php
include("connection.php");
include"header.php";

if(isset($_POST['file'])){

	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["prikaciSlika"]["name"]);

	// zemi ja ekstenzijata
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// validni ekstenzii
	$extensions_arr = array("jpg","jpeg","png","gif");

	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){

		// vo bazata na sliki
		$sql = "INSERT INTO sliki(oglasID) VALUES('3')";
		mysqli_query($conn,$sql);
		$idSlika = mysqli_insert_id($conn); //zema go id-to na zapiso
		$vnesenaSlika = $idSlika.".".$imageFileType; // ime na slikata e id.extenzija
		$sql = "UPDATE sliki SET imeSlika = '$vnesenaSlika' WHERE id = '$idSlika'";
		mysqli_query($conn,$sql);
		

		// smesti go fajlot vo papkata uploads
		move_uploaded_file($_FILES['prikaciSlika']['tmp_name'],$target_dir.$vnesenaSlika);

	}
	$grad = $_POST['grad'];
	echo $grad;

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
									<option value="izdavanje">Издавање</option>
									<option value="prodazba">Продажба</option>
								</select>
							</td>

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Тип на недвижнина:</td>
							<td>
								<select name="tip_objekt" class="selectpicker show-tick">
									<option value="Стан">Стан</option>
									<option value="Куќа">Куќа</option>
									<option value="Спрат од куќа">Спрат од куќа</option>
								</select>
							</td>

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Град</td>
							<td>
								<select name="grad" class="selectpicker show-tick">
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
							<td ><input type='text' name = 'opis' class="form-control"></td>
						</tr>

						<tr>
							<td style="font-size:15px;margin:5px;">Квадратура:</td>	
							<td ><input type='text' name="kvadratura" class="form-control"></td>	

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">
								Ентриер:
							</td>
							<td>
								<select  name="enterier" class="selectpicker show-tick">
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
							<td ><input type='text'name="Спрат" class="form-control"></td>	

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Вкупно спратови:</td>	
							<td ><input type='text'name='Вкупно спратови' class="form-control"></td>	

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Година на изградба:</td>	
							<td ><input type='date' name="godIzgradba"  class="form-control" ></td>	

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
							<td style="font-size:15px;margin:5px;">Цена:</td>	
							<td ><input type='text' class="form-control"></td>
							<td>
								<select name="cena" class="selectpicker show-tick">
									<option value="Евра">Евра</option>
									<option value="Денари">Денари</option>	
									<option value="По договор">По договор</option>						
								</select>	
							</td>		

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Прикачи слика:</td>	
							<td><input type="file" class="btn btn-default" name="prikaciSlika" value="Прикачи"></td>	

						</tr>
						<tr>
							<td><input type="submit" class="btn btn-default btn-success" name="file" value="Внеси го огласот"></td>
						</tr>
					</form>
				</table>

			</div>
		</div>

	</body>
	<footer class="panel-footer">

	</footer>
</html>


















