<?php
$loginform = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "loginform" AND $buttonvalue == "let's go" )
{
    if ( ControleLoginWachtwoord( $_POST['use_email'], $_POST['use_paswd'] ) )
    {
        $_SESSION["msg"][] = "Welcome, " . $_SESSION['use']['use_firstname'] . "!" ;
        header("Location:".$maindirectory."index.php");
    }
    else
    {
        $_SESSION["msg"][] = "Sorry! Wrong login or password!";
        header("Location:".$maindirectory."login.php");
    }
}
else
{
    $_SESSION["msg"][] = "Wrong formname or buttonvalue!";
}
?>