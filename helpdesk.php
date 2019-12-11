<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
?>

<body>
<div class="container">
    <?php
    PrintNavBar(); //NAVIGATIE
    print LoadTemplate("helpdesk"); //TEMPLATE
    ?>
    <?php PrintFooter(); ?>

</div>


</body>
</html>