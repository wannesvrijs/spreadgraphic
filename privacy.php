<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
?>
    <body>
    <?php PrintNavBar(); ?>
        <div class="container" id="privacy">
        <?php print LoadTemplate("privacy"); ?>
        </div>
        <?php PrintFooter(); ?>
    </body>
</html>