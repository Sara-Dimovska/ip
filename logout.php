<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 08-Jan-18
 * Time: 4:49 PM
 */
require_once("./include/korisnicka_strana.php");
include "header.php";

$fgmembersite->LogOut();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Login</title>
    <link rel="STYLESHEET" type="text/css" href="style/fg_korisnicka_strana.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>

<h2><center>Одјавени сте</center></h2>
<p>
    <a href='login.php'><center>Најави се повторно</center></a>
</p>

</body>
</html>