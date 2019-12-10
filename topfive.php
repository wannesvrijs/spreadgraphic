<?php
require_once "lib/autoload.php";
BasicHead();
?>

    <body>
    <?php PrintNavBar(); ?>
    <!-- pagina titel -->
        <div class="container">
            <div class="topfive">
                <h1>These are our top five graphics this week. Get inspired…</h1>
            </div>

            <?php
            $data = GetData("select * from images");
            print LoadTemplate("topfive");
            ?>

        </div>
    <?php PrintFooter(); ?>
    </body>
</html>