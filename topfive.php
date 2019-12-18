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

            $sqljoin =  'inner join users on gra_use_id = use_id
                    inner join gramat on gra_id = gramat_gra_id
                    inner join material on gramat_mat_id = mat_id';

            $data = GetData("SELECT *, GROUP_CONCAT(mat_kind SEPARATOR ', ') as mat_kind FROM graphic $sqljoin GROUP BY gra_id, gra_likes ORDER BY gra_likes DESC LIMIT 5;");
            $template = LoadTemplate("topfive");
            print ReplaceContent( $data, $template);
            ?>

        </div>

    <?php PrintFooter(); ?>
    </body>
</html>