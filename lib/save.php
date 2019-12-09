<?php
require_once "autoload.php";

$tablename = $_POST["tablename"];
$formname = $_POST["formname"];
$afterinsert = $_POST["afterinsert"];
$pkey = $_POST["pkey"];

if ( $_POST["submitbutton"] == "Spread!" )
{
    $sql_body = array();

    //key-value pairs samenstellen
    foreach( $_POST as $field => $value )
    {
        if ( in_array($field, array("tablename", "formname", "afterinsert", "pkey", "submitbutton", $pkey))) continue;

        $sql_body[]  = " $field = '" . htmlentities($value, ENT_QUOTES) . "' " ;
    }

    if ( $_POST[$pkey] > 0 ) //update
    {
        $sql = "UPDATE $tablename SET " . implode( ", " , $sql_body ) . " WHERE $pkey=" . $_POST[$pkey];
        if ( ExecuteSQL($sql) ) $new_url =  "/spreadgraphic/$formname.php?id=" . $_POST[$pkey] . "&updateOK=true" ;
    }
    else //insert
    {
        $sql = "INSERT INTO $tablename SET " . implode( ", " , $sql_body );
        if ( ExecuteSQL($sql) ) $new_url = "/spreadgraphic/$afterinsert?insertOK=true" ;
    }

    print $sql;
    header("Location: $new_url");
}
?>