<?php
require_once "lib/autoload.php";
BasicHead();
?>

<body>
<?php
PrintNavBar(); //NAVIGATIE
$data = GetData("select * from users where use_id=" .$_SESSION['use']['use_id'] );
$template = LoadTemplate("artistpage_adjust"); //TEMPLATE
echo ReplaceContent( $data, $template);
?>
</body>
</html>