<?php
function ShowMessages()
{

    // check of de head er al zeker staat voordat je messages gaat printen
    // seesionvariabele.... WAAROM? --> omdat je deze overal en altijd kan bereike zonder iets anders moeten op te roepen.
    if ( ! $_SESSION["head_printed"] ) BasicHead();

    //weergeven messages
    if (isset($_SESSION["msg"]))
    {

        foreach( $_SESSION["msg"] as $message )
        {
            $row = array( "message" => $message );
            $template = LoadTemplate("messages");
            print ReplaceContentOneRow( $row, $template );
        }

        unset($_SESSION['msg']);
    }
}