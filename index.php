    <?php
    require_once "lib/autoload.php";
    BasicHead();
    ?>

    <body>
        <?php PrintNavBar(); ?>

        <div class="container" id="page_index">
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