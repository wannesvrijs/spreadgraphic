<?php
function ShowMessages()
{
    // check of de head er al zeker staat voordat je messages gaat printen
    // seesionvariabele.... WAAROM? --> omdat je deze overal en altijd kan bereike zonder iets anders moeten op te roepen.
    if ( ! $_SESSION["head_printed"] ) BasicHead();

    //weergeven messages
    if ( count($_SESSION["msg"]) > 0 )
    {

        foreach( $_SESSION["msg"] as $message )
        {
            $row = array( "message" => $message );
            //$data = array( $row ) ;
            $templ = LoadTemplate("messages");
            //print ReplaceContent( $data, $templ );
            print ReplaceContentOneRow( $row, $templ );
        }

        unset($_SESSION['msg']);
    }
}