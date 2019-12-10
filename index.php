    <?php
    require_once "lib/autoload.php";
    BasicHead();
    ?>

    <body>
        <?php PrintNavBar(); ?>

        <!-- zoekbalk -->
        <div class="container">
            <div class="row zoekbalk">
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