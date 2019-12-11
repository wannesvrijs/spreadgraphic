<?php
require_once "lib/autoload.php";
ShowMessages();
BasicHead();
?>

<body>
<?php
PrintNavBar(); //NAVIGATIE
print LoadTemplate("artistpage"); //TEMPLATE
?>
<?php PrintFooter(); ?>

</body>
</html>