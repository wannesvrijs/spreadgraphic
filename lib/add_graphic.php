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
    $userid = $_SESSION['use']['use_id'];
    $fileNameNew = $userid."_".uniqid('',true).".".$fileActualExt;

    $allowed = array('jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {
                $fileDestination = '../graphics/'. $fileNameNew;

//-------------- verplaats file naar folder uploads
                move_uploaded_file($fileTmpName, $fileDestination);

//-------------- insert alle ingegeven data (inclusief gra_img - naam) in dat databank;
                $insert = "INSERT INTO $tablename SET " .
                    " gra_use_id='" . $_SESSION['use']['use_id'] . "' , " .
                    " gra_image='" . $fileNameNew . "' , " .
                    " gra_description='" . htmlentities($_POST['gra_description'], ENT_QUOTES) . "' , " .
                    " gra_tags='" . htmlentities($_POST['gra_tags'], ENT_QUOTES) . "' , " .
                    " gra_uploaddate = NOW() ," .
                    " gra_likes = 0";
                $insertid = GetInsertedId($insert);


//-------------- insert de aangeduide materialen
                $materials = $_POST['material'];
                foreach ($materials as $material) {
                    $sql .= "INSERT INTO gramat SET " .
                        " gramat_gra_id='" . $insertid . "' , " .
                        " gramat_mat_id='" . $material . "';";
                }

                if (ExecuteSQL($sql)) {
                    $_SESSION["msg"][] = "Your graphic has been added!";
                    header("location:".$maindirectory."profile.php");


                } else {
                    $_SESSION["msg"][] = "Sorry, something went wrong. Your graphic was not fed!";
                    header("location:".$maindirectory."profile.php");
                }
            } else {
                $_SESSION["msg"][] = "Your graphic exceeds the maximum file size!";
                header("location:".$maindirectory."add_graphic.php");
            }
        } else {
            $_SESSION["msg"][] = "There was an error uploading your file!";
            header("location:".$maindirectory."add_graphic.php");
        }
    } else {
        $_SESSION["msg"][] = "No files of this kind are allowed!";
        header("location:".$maindirectory."add_graphic.php");
    }
}



