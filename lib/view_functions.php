<?php

$maindirectory = "/wdev_wannes/spreadgraphic/";

/* <HEAD> OPHALEN
------------------------------------------------------------------------*/
function BasicHead()
{
    print LoadTemplate("basic_head");

    $_SESSION["head_printed"] = true;
}

/* FOOTER PRINTEN
------------------------------------------------------------------------*/
function PrintFooter()
{
    print LoadTemplate("footer");
}

/* NAVIGATIEBAR PRINTEN
------------------------------------------------------------------------*/
function PrintNavBar()
{
    if ( ! isset($_SESSION['use'])) $data = GetData("select * from menu where men_id between 1 and 3 order by men_order");
    else $data = GetData("select * from menu where men_id <> 3 order by men_order");

        $laatstedeelurl = basename($_SERVER['SCRIPT_NAME']);

        //aan de juiste datarij, de sleutel 'active' toevoegen
        foreach ($data as $r => $row) {
            //if ( $r == 0 )
            if ($laatstedeelurl == $data[$r]['men_destination']) {
                $data[$r]['active'] = 'active';
            } else {
                $data[$r]['active'] = '';
            }
        }

        //template voor 1 item samenvoegen met data voor items
        $template_navbar_item = LoadTemplate("navbar_item");
        $navbar_items = ReplaceContent($data, $template_navbar_item);

        //navbar template samenvoegen met resultaat ($navbar_items)
        $data = array("navbar_items" => $navbar_items);
        if ($_SERVER["SCRIPT_URL"] == $maindirectory."login.php") $template_navbar = LoadTemplate("navbar_login");
        else $template_navbar = LoadTemplate("navbar");

        print ReplaceContentOneRow($data, $template_navbar);

}

/* TEMPLATE OPHALEN
------------------------------------------------------------------------*/
function LoadTemplate( $name )
{
    if ( file_exists("$name.html") ) return file_get_contents("$name.html");
    if ( file_exists("templates/$name.html") ) return file_get_contents("templates/$name.html");
    if ( file_exists("../templates/$name.html") ) return file_get_contents("../templates/$name.html");
}


/* DATA VAN DATABASE + TEMPLATE PRINTEN --> $data
------------------------------------------------------------------------*/
function ReplaceContent( $data, $template_html )
{
    $returnval = "";
    foreach ($data as $row) {
        //replace fields with values in template
        $content = $template_html;

        //custom klasse voor de top van de profile die zorgt dat settingsfunctie enkel op het eigen profiel zichtbaar zijn
        if (IsMe()) {
            $row['settings'] = 'visible';
        }

        foreach ($row as $field => $value) {

            //dateformat
            if ($field == 'gra_uploaddate') {
                $new_date = new DateTime($value);
                $value = $new_date->format('F d, Y');
            }

            $content = str_replace("@@$field@@", $value, $content);
        }
        $returnval .= $content;
    }
    return $returnval;
}


require_once 'like.php';

//custom replacecontent die de likeknoppen juist insteld voor index en profile
function ReplaceContentIndex( $data, $template_html )
{
    $returnval = "";
    foreach ($data as $row) {
        //replace fields with values in template
        $content = $template_html;

        //haal de info op of de graphic reeds geliked is voeg de klasse toe aan de data
        if (previously_liked($row['gra_id'])) $row['liked'] = 'fas fa-heart';
        else $row['liked'] = 'far fa-heart';

        //zorg dat je enkel eigen werk kan verwijderen
        if (IsMe()) {
            $row['action'] ='lib/deletefile.php';
            $row['delete'] = '<button class="deletebutton fa fa-trash" name="deletebutton" type="submit" value="delete"></button>';
        }

        foreach ($row as $field => $value) {

            //dateformat
            if ($field == 'gra_uploaddate') {
                $new_date = new DateTime($value);
                $value = $new_date->format('F d, Y');
            }

            $content = str_replace("@@$field@@", $value, $content);
        }
        $returnval .= $content;
    }
    return $returnval;
}


/* DATA VAN DATABASE + TEMPLATE PRINTEN --> $row
------------------------------------------------------------------------*/
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

//check of de pagina toebehoord aan de momenteel ingelogde user
function IsMe ()
{
    if ($_GET['id'] === null or $_GET['id'] == $_SESSION['id']) return true;
    else return false;
}