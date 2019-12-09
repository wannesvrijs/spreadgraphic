<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];

if ( $_POST["submitbutton"] == "Spread!" )
{
    $file = $_FILES['use_img'];

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
                $fileDestination = '../graphics/'. $fileNameNew;

//              verplaats file naar folder uploads
                move_uploaded_file($fileTmpName, $fileDestination);

//              insert alle ingegeven data (inclusief gra_img - naam) in dat databank;
                $sql = "INSERT INTO $tablename SET " .
                    " gra_use_id='" . $_SESSION['use']['use_id'] . "' , " .
                    " gra_image='" . $fileNameNew . "' , " .
                    " gra_description='" . htmlentities($_POST['gra_description'], ENT_QUOTES) . "' , " .
                    " gra_tags='" . htmlentities($_POST['gra_tags'], ENT_QUOTES) . "' , " .
//                    " gra_material='" . implode(' ',$_POST['material']) . "' , " .
                    " gra_uploaddate = NOW()";

                if (ExecuteSQL($sql)) {
                    $_SESSION["msg"][] = "uw werk werd toegevoed!";

                } else {
                    $_SESSION["msg"][] = "Sorry, er liep iets fout. uw werk werd niet toegevoed";
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



