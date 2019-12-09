<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = $_POST["tablename"];

if ( $_POST["submitbutton"] == "Spread!" )
{
    $file = $_FILES['use_picture'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = uniqid('',true).".".$fileActualExt;

    $allowed = array('jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileDestination = '../profile_img/'. $fileNameNew;

//              verplaats file naar folder uploads
                move_uploaded_file($fileTmpName, $fileDestination);

//              insert alle ingegeven data (inclusief gra_img - naam) in dat databank;

                $sql = "UPDATE $tablename SET " .
                    " use_id='" . $_SESSION['use']['use_id'] . "' , " .
                    " use_name='" . htmlentities($_POST['use_name'], ENT_QUOTES) . "' , " .
                    " use_firstname='" . htmlentities($_POST['use_firstname'], ENT_QUOTES) . "' , " .
                    " use_email='" . $_POST['use_email'] . "' , " .
                    " use_picture='" . $fileNameNew . "' , " .
                    " use_fb='" . $_POST['use_fb'] . "' , " .
                    " use_instagram='" . $_POST['use_instagram'] . "' , " .
                    " use_caption='" . htmlentities($_POST['use_caption'], ENT_QUOTES) . "' , " .
                    " use_about='" . htmlentities($_POST['use_about'], ENT_QUOTES) . "' , " .
                    " use_education='" . htmlentities($_POST['use_education'], ENT_QUOTES) . "'";

                echo $sql;

                if (ExecuteSQL($sql)) {
                    $_SESSION["msg"][] = "your profile has been updated!";

                } else {
                    $_SESSION["msg"][] = "something went wrong, your profile hasn't been updated";
                }
            } else {
                $_SESSION["msg"][] = "your image exceeds the maximum file size";
            }
        } else {
            $_SESSION["msg"][] = "there was an error uploading your file";
        }
    } else {
        $_SESSION["msg"][] = "no files of this kind are allowed";
    }
}

?>