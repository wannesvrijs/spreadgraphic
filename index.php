    <?php
    require_once "lib/autoload.php";
    BasicHead();
    ?>

    <body id="page_index">
        <?php PrintNavBar(); ?>

        <div class="container">
                <div class="zoekbalk">
                    <input type="text" placeholder="#">
                </div>

                <?php
                $data = GetData("select * from images");
                $template = LoadTemplate("index");
                print ReplaceContent( $data, $template);
                ?>

        </div>
    <?php PrintFooter(); ?>

    </body>
</html>