<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
?>

<body>
<?php
PrintNavBar(); //NAVIGATIE
print LoadTemplate("artistpage"); //TEMPLATE
?>
<?php PrintFooter(); ?>

</body>
</html>