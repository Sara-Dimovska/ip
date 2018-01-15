<?php

include "korisnikHeader.php";
include "connection.php";
require_once("./include/korisnicka_strana.php");

if(!$fgmembersite->CheckLogin())
{
	$fgmembersite->RedirectToURL("login.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
	<head>
	</head>
	<body>
		<div class="container urediProfil" style="margin:30 auto;background-color:whitesmoke;border-radius:4px;">
			<?php
			$user_id =  $fgmembersite->User_id();



			$sql = mysqli_query($conn,"SELECT *
				FROM korisnici
				WHERE korisnici.id = '$user_id'
				") or die("Error");

			$row = mysqli_fetch_array($sql);

			?>
			<table>
				<tr>
					<td>
						<p style="font-size:15px;margin:5px;">Име:</p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="ime" placeholder="<?=$row['ime']; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-size:15px;margin:5px;">E-mail:</p>
					</td>
					<td>
						<p style="font-size:15px;margin:5px;">Телефон:</p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="ime" placeholder="<?=$row['email']; ?>" class="form-control">
					</td>
					<td>
						<input type="text" name="ime" placeholder="<?=$row['telefon']; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-size:15px;margin:5px;">Тековна лозинка:</p>
					</td>

				</tr>
				<tr>
					<td>
						<input type="text" name="ime"  class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-size:15px;margin:5px;">Нова лозинка:</p>
					</td>

				</tr>
				<tr>
					<td>
						<input type="text" name="ime"  class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-size:15px;margin:5px;">Повторете нова лозинка:</p>
					</td>

				</tr>
				<tr>
					<td>
						<input type="text" name="ime"  class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" class="btn btn-default btn-success" name="vnesiOglas" value="Зачувај промени">

					</td>
				</tr>
			</table>



		</div>


	</body>
</html>
