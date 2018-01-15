<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 08-Jan-18
 * Time: 4:48 PM
 */
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
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Home page</title>
    <link rel="STYLESHEET" type="text/css" href="style/fg_korisnicka_strana.css">
</head>
<body>
<div id='fg_membersite_content'>
    <h2>Почетна страна</h2>
     <?php 
			if ($fgmembersite->User_type() == "корисник")
				$fgmembersite->RedirectToURL("korisnikPocetna.php");
	
			else if($fgmembersite->User_type() == "модератор")
				$fgmembersite->RedirectToURL("moderator.php");

		
	?>

    <p><a href='change-pwd.php'>Промени лозинка</a></p>

    <p><a href='access-controlled.php'>A sample 'members-only' page</a></p>
    <br><br><br>
    <p><a href='logout.php'>Одјава</a></p>
</div>
</body>
</html>
