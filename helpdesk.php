<?php
require_once "lib/autoload.php";
ShowMessages();
BasicHead();
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