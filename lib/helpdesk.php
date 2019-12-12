<?php
require_once "autoload.php";

$mailcontent = "email sent by:".$_SESSION['use']['use_name']." ".$_SESSION['use']['use_firstname'].",\r\n".
            "reply this mail to:".$_SESSION['use']['use_email'].",\r\n\r\n".
            "content:".$_POST['hel_question'];


$formname = $_POST["formname"];
$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];

if ( $formname == "helpdesk" AND $_POST['sendbutton'] == "Send" )
{
    $sql = "INSERT INTO $tablename SET " .
        " hel_subject='" . htmlentities($_POST['hel_subject'], ENT_QUOTES) . "' , " .
        " hel_question='" . htmlentities($_POST['hel_question'], ENT_QUOTES) . "' , " .
        " hel_date = NOW()";


    mail($mailwannes,"Question :".$_POST['hel_subject'], $mailcontent,'Cc:'.$mailanneleen);


    if ( ExecuteSQL($sql) )
    {
        // een melding weergeven
        $_SESSION["msg"][] = "Uw vraag is verzonden! " ;
        // na het clicken van de knop ga je naar de index pagina
        header("Location:".$maindirectory."index.php");
    }
    else
    {
        // als er een fout gebeurd krijg je deze melding
        $_SESSION["msg"][] = "Sorry, er liep iets fout. Er werd geen vraag verstuurd!" ;
        // bij een fout, blijf je op de pagina
        header("Location:".$maindirectory."helpdesk.php");
    }
}
?>