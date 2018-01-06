<?php
include("connection.php");

if(isset($_POST['file'])){

	$name = $_FILES['prikaciSlika']['name'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["prikaciSlika"]["name"]);

	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");

	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){

		// Insert record
		//$sql = "INSERT INTO sliki(oglasID,link) VALUES('11','$name')";
		//$result = mysqli_query($conn,$sql);
		
		// Upload file
		move_uploaded_file($_FILES['prikaciSlika']['tmp_name'],$target_dir.$name);

	}

}
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
	<body style="background-color:#E0E0E0;">



		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header" style="
												  height: 200px;
												  ">
					<a class="navbar-brand" href="#"><img src="assets/26637800_1929517467266064_712596651_n.png"></a>
				</div>

				<div class="nav-left">
					<button type="button" class="btn btn-default  navbar-btn" style="
																					 display: inline-block;
																					 ">Сите огласи</button>

																					 
					<button type="button" class="btn btn-default  navbar-btn" style="
																					 display: inline-block;
																					 ">Внеси оглас</button>
					<button type="button" class="btn btn-default  navbar-btn" style="
																					 display: inline-block;
																					 ">Помош</button>
					<button type="button" class="btn btn-default  navbar-btn" style="
																					 display: inline-block;
																					 ">Регистрирај се</button>

					<!--
<ul style="display: block; margin-bottom:20px;" class="center">
<a href="default.asp" class="glavno_meni"> Сите огласи </a>
<li style="display: inline-block;">
<a href="news.asp" class="glavno_meni">Внеси оглас</a>
</li>
<li style="
display: inline-block;
"><a href="contact.asp" class="glavno_meni">Помош</a></li>
<li style="
display: inline-block;
"><a href="about.asp" class="glavno_meni">Регистрирај се</a></li>
</ul> -->
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<form class="navbar-form navbar-right" style="margin-top: 130px;">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>

						<button type="submit" class="btn btn-default btn-primary">Пребарај</button>
						<button type="button" class="btn btn-default  navbar-btn">Најави се</button>
					</form>


				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>


		<div class="container">

			<div class = "left">
				<table>
					<form method="post" action="vnesiOglas.php" enctype='multipart/form-data'>
						<tr>
							<td style="font-size:15px;margin:5px;">Изберете Категорија</td>
							<td>
								<select  class="selectpicker show-tick">
									<option>Издавање</option>
									<option>Продажба</option>
								</select>
							</td>

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Тип на недвижнина:</td>
							<td>
								<select  class="selectpicker show-tick">
									<option>Стан</option>
									<option>Куќа</option>
									<option>Спрат од куќа</option>
								</select>
							</td>

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Град</td>
							<td>
								<select  class="selectpicker show-tick">
									<option>Скопје</option>
									<option>Штип</option>
									<option>Битола</option>
									<option>Прилеп</option>
									<option>Охрид</option>
									<option>Струмица</option>
									<option>Свети Николе</option>
									<option>Кочани</option>
									<option>Берово</option>

								</select>
							</td>

						</tr>
						<tr>

							<td  style="font-size:15px;margin:5px;">Наслов на огласот:</td>
							<td><input type='text' class="form-control"></td>
						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Опис:</td>
							<td ><input type='text' class="form-control"></td>
						</tr>

						<tr>
							<td style="font-size:15px;margin:5px;">Квадратура:</td>	
							<td ><input type='text' class="form-control"></td>	

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">
								Ентриер:
							</td>
							<td>
								<select  class="selectpicker show-tick">
									<option>наместен</option>
									<option>делумно наместен</option>
									<option>ненаместен</option>

								</select>	
							</td>	
						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Соби:</td>
							<td>
								<select  class="selectpicker show-tick">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>над 9</option>

								</select>	
							</td>	
						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Греење:</td>
							<td>
								<select  class="selectpicker show-tick">
									<option>Нема</option>
									<option>Централно</option>
									<option>Струја</option>
									<option>Дрва</option>
									<option>Друго</option>								
								</select>	
							</td>	
						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Спрат:</td>	
							<td ><input type='text' class="form-control"></td>	

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Вкупно спратови:</td>	
							<td ><input type='text' class="form-control"></td>	

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Година на изградба:</td>	
							<td ><input type='text' class="form-control"></td>	

						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Лифт:</td>
							<td>
								<select  class="selectpicker show-tick">
									<option>Да</option>
									<option>Не</option>							
								</select>	
							</td>	
						</tr>
						<tr>
							<td style="font-size:15px;margin:5px;">Цена:</td>	
							<td ><input type='text' class="form-control"></td>
							<td>
								<select  class="selectpicker show-tick">
									<option>Евра</option>
									<option>Денари</option>	
									<option>По договор</option>						
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


















