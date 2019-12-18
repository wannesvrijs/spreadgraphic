<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
?>
    <body  id="page_privacy">
    <?php PrintNavBar(); ?>

        <div class="container">
        <?php print LoadTemplate("privacy"); ?>
        </div>

    <?php PrintFooter(); ?>
    </body>
</html>




