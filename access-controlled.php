<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 08-Jan-18
 * Time: 4:39 PM
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
    <title>An Access Controlled Page</title>
    <link rel="STYLESHEET" type="text/css" href="style/fg_korisnicka_strana.css">
</head>
<body>
<div id='fg_membersite_content'>
    <h2>Тука кога ќе се логира</h2>
    This page can be accessed after logging in only. To make more access controlled pages,
    copy paste the code between &lt;?php and ?&gt; to the page and name the page to be php.
    <p>
        Логирани сте како: <?= $fgmembersite->UserFullName() ?>
    </p>
    <p>
        <a href='login-home.php'>Почетна</a>
    </p>
</div>
</body>
</html>
