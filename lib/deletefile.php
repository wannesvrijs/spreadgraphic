<?php
require_once 'autoload.php';

$gra_id = $_POST['gra_id'];

$data = GetData("Select gra_image from graphic where gra_id = $gra_id");
$img_filename = $data[0]['gra_image'];
$path = "../graphics/$img_filename";

$sql = "Delete from graphic where gra_id = $gra_id;
        Delete from likes where like_gra_id = $gra_id;
        Delete from gramat where gramat_gra_id = $gra_id;";

if (unlink($path)) {
    if (ExecuteSQL($sql)) {
        header("Location:".$maindirectory."profile.php");
    } else {
        $_SESSION["msg"][] = "Image could not be deleted!";
    }
} else {
    $_SESSION["msg"][] = "Image could not be unlinked from database";
}
