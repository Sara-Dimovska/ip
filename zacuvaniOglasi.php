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
		<div class="container" style="margin:30 auto;background-color:whitesmoke;border-radius:4px;">
			<?php
			$user_id =  $fgmembersite->User_id();

			//echo $user_id;
			$oglasi = "";
			$zapisi_naStrana =12;


			$sql = mysqli_query($conn,"SELECT *
				FROM zacuvani_oglasi,oglasi
				INNER JOIN sliki ON (oglasi.oglasID = sliki.oglasID)
				WHERE zacuvani_oglasi.korisnicko_id = '$user_id' AND zacuvani_oglasi.oglasID = oglasi.oglasID
				GROUP BY sliki.oglasID
				") or die("Error");

			$oglasi = mysqli_num_rows($sql);
			echo '<p style="margin-left:10px; margin-right:20px;margin-top:20px;font-size:20px; color:white; background-color:#dd6464;padding:5px; border-radius:4px;" ><strong>Вкупно огласи: ';
			echo $oglasi;

			$brojStrani = ceil($oglasi/$zapisi_naStrana);
			//tekovna strana
			if(!isset($_GET['strana'])){
				$strana = 1;
			}else{
				$strana = $_GET['strana'];
			}
			$stranaOD = ($strana-1)*$zapisi_naStrana;

			echo '</strong></p>';
			while ($row = mysqli_fetch_array($sql)){
				echo "<a href='oglas.php?id=".$row['oglasID']. "'>";
				echo "<div class ='oglas'>";
				echo "<img src='uploads/".$row['imeSlika']."' />";
				echo '<div class="oglas-text">';
				echo $row['naslov'];
				//if($row['cena'] == 0)
				switch($row['tip_cena']){
					case 'Евра': echo '<br>Цена: <div style="height:30px;padding:5px;display: inline; border-radius:4px; background-color:green;">'.$row['cena'] . ' &euro; </div>'; break;
					case 'По договор': echo '<br>Цена: <div style="height:30px;padding:5px;display: inline; border-radius:4px; background-color:yellow; color:black;">По договор</div>'; break;
				}
				echo "</div>";
				echo "</div>";
				echo "</a>";
			}
			?>

			<div class="text-center" >

				<ul class="pagination">
					<li>
						<?php
						// echo '<a href="href = "index.php?strana='.($strana-1).'" aria-label="Previous">';
						// echo    '<span aria-hidden="true">&laquo;</span>';
						// echo '</a>';
						?>
					</li>
					<?php
					for($strana = 1;$strana <= $brojStrani;$strana++){

						echo ' <li><a href = "index.php?strana='.$strana.'">'.$strana.'</a></li>';
					}
					//mkdir("testing");
					?>

				</ul>

			</div>

		</div>


	</body>
</html>
