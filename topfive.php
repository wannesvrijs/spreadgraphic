<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();

?>
    <body id="page_topfive">
    <?php PrintNavBar(); ?>
    <!-- pagina titel -->
        <div class="container">
            <h1>These are our top five graphics this week. Get inspired…</h1>

            <?php
            $data = GetData("select * from graphic LIMIT 5");
            $template = LoadTemplate("topfive");
            print ReplaceContent( $data, $template);
            ?>

        </div>

    <?php PrintFooter(); ?>
    </body>
</html>