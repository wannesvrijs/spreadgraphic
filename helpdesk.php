<?php
require_once "lib/autoload.php";
BasicHead();
?>

<body>
<?php
PrintNavBar(); //NAVIGATIE
print LoadTemplate("helpdesk"); //TEMPLATE
?>
<?php PrintFooter(); ?>

</body>
</html>