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
            $data = GetData("select COUNT(like_id) AS aantal_likes, gra_image, gra_description, gra_tags, gra_uploaddate, use_caption, use_firstname, use_name, use_picture from graphic INNER JOIN likes ON like_gra_id = gra_id INNER JOIN users ON gra_use_id = use_id GROUP BY gra_id ORDER BY aantal_likes DESC LIMIT 5;");
            $template = LoadTemplate("topfive");
            print ReplaceContent( $data, $template);
            ?>

        </div>

    <?php PrintFooter(); ?>
    </body>
</html>