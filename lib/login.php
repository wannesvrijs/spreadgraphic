<?php
$loginform = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "loginform" AND $buttonvalue == "let's go" )
{
    if ( ControleLoginWachtwoord( $_POST['use_email'], $_POST['use_paswd'] ) )
    {
        $_SESSION["msg"][] = "Welkom, " . $_SESSION['use']['use_firstname'] . "!" ;
        header("Location: /spreadgraphic/index.php");
    }
    else
    {
        $_SESSION["msg"][] = "Sorry! Verkeerde login of wachtwoord!";
        header("Location: /spreadgraphic/login.php");
    }
}
else
{
    $_SESSION["msg"][] = "Foute formname of buttonvalue";
}
?>