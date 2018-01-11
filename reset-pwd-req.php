<?php
/**
 * Created by PhpStorm.
 * User: Ivana
 * Date: 08-Jan-18
 * Time: 4:52 PM
 */
require_once("./include/korisnicka_strana.php");

$emailsent = false;
if(isset($_POST['submitted']))
{
    if($fgmembersite->EmailResetPasswordLink())
    {
        $fgmembersite->RedirectToURL("reset-pwd-link-sent.html");
        exit;
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Барање за ресетирање на лозинка</title>
    <link rel="STYLESHEET" type="text/css" href="style/fg_korisnicka_strana.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>
<!-- Form Code Start -->
<div id='fg_membersite'>
    <form id='resetreq' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
        <fieldset >
            <legend>Ресетирање на лозинка</legend>

            <input type='hidden' name='submitted' id='submitted' value='1'/>

            <div class='short_explanation'>* required fields</div>

            <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
            <div class='container'>
                <label for='username' >Your Email*:</label><br/>
                <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
                <span id='resetreq_email_errorloc' class='error'></span>
            </div>
            <div class='short_explanation'>На вашата email адреса ќе биде испратен линк за ресетирање на лозинката.</div>
            <div class='container'>
                <input type='submit' name='Submit' value='Submit' />
            </div>

        </fieldset>
    </form>
    <!-- client-side Form Validations:
    Uses the excellent form validation script from JavaScript-coder.com-->

    <script type='text/javascript'>
        // <![CDATA[

        var frmvalidator  = new Validator("resetreq");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();

        frmvalidator.addValidation("email","req","Внесете ја email адресата што ја искористивте за да се најавите.");
        frmvalidator.addValidation("email","email","Внесете ја email адресата што ја искористивте за да се најавите.");

        // ]]>
    </script>

</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>