<?php
require_once "autoload.php";
function PrintNavBar()
{
    //navbar items ophalen
    $data = GetData("select * from menu order by men_order");

    //-->iets met actief item
    $laatste_deel_url = basename($_SERVER['SCRIPT_NAME']);

    //aan de eerste datarij, 'home', de sleutels 'active' en 'sr-only' toevoegen
    foreach( $data as $r => $row )
    {
        if ( $r == 0 )
        {
            $data[$r]['active'] = 'active';
            $data[$r]['sr_only'] = '<span class="sr-only">(current)</span>';
        }
        else
        {
            $data[$r]['active'] = '';
            $data[$r]['sr_only'] = '';
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
