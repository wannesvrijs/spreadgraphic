<?php
require_once 'autoload.php';

//kijk na of de graphic bestaat om te verkomen dat iemand de code gaat "hacken"
function graphic_exists($gra_id) {
    $gra_id = (int)$gra_id;
    if (GetData("select count(*) as count from graphic where gra_id = $gra_id")[0]['count'] == 0) return false;
    else return true;
}

//check of de post reeds geliked is door de aangemelde user
function previously_liked($gra_id) {
    $gra_id = (int)$gra_id;
    if (GetData("select count(*) as count from likes where like_gra_id = $gra_id and like_use_id =".$_SESSION['use']['use_id'])[0]['count'] == 0) return false;
    else return true;

}

// haal het aantal likes op dat word bijgehouden binnen de graphics table
function like_count($gra_id) {
    $gra_id = (int)$gra_id;
    return GetData("select * from graphic where gra_id = $gra_id")[0]['gra_likes'];
}

//voeg een tabel toe aan de likes tabel bij een like, voeg 1tje toe aan het totaal aantal likes en trek terug af indien er reeds geliked is
function add_like($gra_id) {
    $gra_id = (int)$gra_id;
    ExecuteSQL("Update graphic set gra_likes = gra_likes + 1 where gra_id = $gra_id");
    ExecuteSQL("Insert into likes set like_gra_id = $gra_id, like_use_id =".$_SESSION['use']['use_id']);

}