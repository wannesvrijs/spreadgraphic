<?php
    require_once "lib/autoload.php";
    ShowMessages();
    BasicHead();
?>
    <body>
    <?php PrintNavBar(); ?>
        <div class="container" id="privacy">
        <?php print LoadTemplate("privacy"); ?>
        </div>
        <?php PrintFooter(); ?>
    </body>
</html>