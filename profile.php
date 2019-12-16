<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();

?>




<body id="page_profile">
<?php PrintNavBar(); ?>
        <div class="container">
            <?php
            $data = GetData("select * from users where use_id='" . $_GET['user'] . "'");
            $template = LoadTemplate("profile_top");
            print ReplaceContent( $data, $template);
            ?>
            <section>
                <a href="add_graphic.php" class="profile_underline add_graphic_here">
                    <span class="fas fa-plus"></span>
                </a>
                <?php
                    $data = GetData("select * from graphic where gra_use_id='" . $_GET['user'] . "' ORDER BY gra_uploaddate DESC");
                    $template = LoadTemplate("index");
                    print ReplaceContent( $data, $template);
                ?>
            </section>
        </div>

    <?php PrintFooter(); ?>
    </body>
</html>