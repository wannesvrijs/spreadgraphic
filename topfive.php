<?php
    require_once "lib/autoload.php";
    ShowMessages();
    BasicHead();
?>
    <body id="page_topfive">
    <?php PrintNavBar(); ?>
    <!-- pagina titel -->
        <div class="container">
            <h1>These are our top five graphics this week. Get inspired…</h1>

            <?php
            print LoadTemplate("topfive");
            ?>

        </div>

    <?php PrintFooter(); ?>
    </body>
</html>