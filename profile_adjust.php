<?php
require_once "lib/autoload.php";

//redirect naar homepage als er niemand is ingelogd
if ( ! isset($_SESSION['use']) ) { header("Location: index.php"); exit; }

BasicHead();
ShowMessages();
?>

<body>
<?php
PrintNavBar(); //NAVIGATIE
$data = GetData("select * from users where use_id=" .$_SESSION['use']['use_id'] );
$template = LoadTemplate("profile_adjust"); //TEMPLATE
echo ReplaceContent( $data, $template);
?>
<?php PrintFooter(); ?>

</body>
</html>