<?php
$registerform = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];

if ( $formname == "registration_form" AND $_POST['registerbutton'] == "Register" )
{
    //controle of gebruiker al bestaat
    $sql = "SELECT * FROM users WHERE use_login='" . $_POST['use_email'] . "' ";
    $data = GetData($sql);
    if ( count($data) > 0 ) die("Deze gebruiker bestaat reeds! Gelieve een andere login te gebruiken.");

    //controle wachtwoord minimaal 8 tekens
    if ( strlen($_POST["use_paswd"]) < 8 ) die("Uw wachtwoord moet minstens 8 tekens bevatten!");

    //controle geldig e-mailadres
    if (!filter_var($_POST["use_email"], FILTER_VALIDATE_EMAIL)) die("Ongeldig email formaat voor login");

    //wachtwoord coderen
    $password_encrypted = password_hash ( $_POST["use_paswd"] , PASSWORD_DEFAULT );

    $sql = "INSERT INTO $tablename SET " .
                " use_firstname='" . htmlentities($_POST['use_firstname'], ENT_QUOTES) . "' , " .
                " use_name='" . htmlentities($_POST['use_name'], ENT_QUOTES) . "' , " .
                " use_email='" . $_POST['use_email'] . "' , " .
                " use_picture='default.svg' , " .
                " use_paswd='" . $password_encrypted . "'  " ;

    if ( ExecuteSQL($sql) )
    {
        $_SESSION["msg"][] = "Bedankt voor uw registratie!" ;

        if ( ControleLoginWachtwoord( $_POST["use_email"] , $_POST["use_paswd"]) )
        {
            header("Location: /oef62/steden.php");
        }
    }
    else
    {
        $_SESSION["msg"][] = "Sorry, er liep iets fout. Uw gegevens werden niet goed opgeslagen" ;
    }
}
?>