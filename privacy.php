<?php
require_once "lib/autoload.php";
BasicHead();
?>

<body>
<div class="container">
    <?php
    PrintNavBar(); //NAVIGATIE
    print LoadTemplate("privacy"); //TEMPLATE
    ?>
    <?php PrintFooter(); ?>

</div>

</body>
</html>