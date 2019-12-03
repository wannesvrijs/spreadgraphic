<?php
session_start();
session_destroy();
unset($_SESSION); // ALLE SESSIONVARIABELEN LEEGMAKEN

session_start();
session_regenerate_id(); // nieuw id genereren omdat een browser de neiging heeft een session id te recupereren
$_SESSION["msg"][] = "U bent afgemeld!";
header("Location: /oef62/login.php");
?>