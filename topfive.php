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
            $data = GetData("select * from graphic inner join users on gra_use_id = use_id INNER JOIN likes ON like_gra_id = gra_id ORDER BY like_gra_id DESC
LIMIT 5");
            $template = LoadTemplate("topfive");
            print ReplaceContent( $data, $template);
            ?>

        </div>

    <?php PrintFooter(); ?>
    </body>
</html>