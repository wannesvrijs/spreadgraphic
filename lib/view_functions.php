<?php
/* Deze functie laadt de <head> sectie */
function BasicHead()
{
    print LoadTemplate("basic_head");

    $_SESSION["head_printed"] = true;
}

function PrintNavBar()
{
    //navbar items ophalen
    $data = GetData("select * from menu order by men_order");

    $laatstedeelurl = basename($_SERVER['SCRIPT_NAME']);

    //aan de juiste datarij, de sleutel 'active' toevoegen
    foreach( $data as $r => $row )
    {
        //if ( $r == 0 )
        if ($laatstedeelurl == $data[$r]['men_destination'])
        {
            $data[$r]['active'] = 'active';
        }
        else
        {
            $data[$r]['active'] = '';
        }
    }

    //template voor 1 item samenvoegen met data voor items
    $template_navbar_item = LoadTemplate("navbar_item");
    $navbar_items = ReplaceContent($data, $template_navbar_item);

    //navbar template samenvoegen met resultaat ($navbar_items)
    $data = array( "navbar_items" => $navbar_items ) ;
    $template_navbar = LoadTemplate("navbar");
    print ReplaceContentOneRow($data, $template_navbar);
}

/* Deze functie laadt de opgegeven template */
function LoadTemplate( $name )
{
    if ( file_exists("$name.html") ) return file_get_contents("$name.html");
    if ( file_exists("templates/$name.html") ) return file_get_contents("templates/$name.html");
    if ( file_exists("../templates/$name.html") ) return file_get_contents("../templates/$name.html");
}

/* Deze functie voegt data en template samen en print het resultaat */
function ReplaceContent( $data, $template_html )
{
    $returnval = "";

    foreach ( $data as $row )
    {
        //replace fields with values in template
        $content = $template_html;
        foreach($row as $field => $value)
        {
            $content = str_replace("@@$field@@", $value, $content);
        }

        $returnval .= $content;
    }

    return $returnval;
}

/* Deze functie voegt data en template samen en print het resultaat */
function ReplaceContentOneRow( $row, $template_html )
{
        //replace fields with values in template
        $content = $template_html;
        foreach($row as $field => $value)
        {
            $content = str_replace("@@$field@@", $value, $content);
        }

    return $content;
}