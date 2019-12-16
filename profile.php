<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();

?>




<body id="page_profile">
<?php PrintNavBar(); ?>
        <div class="container">
            <?php
            if (IsMe()) $data = GetData("select * from users where use_id='" . $_SESSION['use']['use_id'] . "'");
            else $data = GetData("select * from users where use_id='" . $_GET['id'] . "'");
            $template = LoadTemplate("profile_top");
            print ReplaceContent( $data, $template);
            ?>
            <section>
                <a href="add_graphic.php" class="profile_underline add_graphic_here">
                    <span class="fas fa-plus"></span>
                </a>
                <?php
                    if (IsMe()) $data = GetData("select * from graphic where gra_use_id='" . $_SESSION['use']['use_id'] . "' ORDER BY gra_uploaddate DESC");
                    else $data = GetData("select * from graphic where gra_use_id='" . $_GET['id'] . "' ORDER BY gra_uploaddate DESC");
                    $template = LoadTemplate("index");
                    print ReplaceContent( $data, $template);
                ?>
            </section>
        </div>

    <?php PrintFooter(); ?>
    </body>
</html>