<?php
session_start();
$_SESSION["head_printed"] = false;

$maindirectory = "/wdev_wannes/spreadgraphic/";

require_once "pdo.php";                //database functies
require_once "view_functions.php";     //basic_head, load_template, replacecontent...
require_once "authorisation.php";      //controle login e.d.
require_once "show_messages.php";
require_once "like.php";                // likes controle


