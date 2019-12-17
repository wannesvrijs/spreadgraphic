<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
?>

<body id="page_profile">
<?php PrintNavBar(); ?>
        <div class="container">
            <?php
            if (IsMe()) {
                    $data_id = $_SESSION['use']['use_id'];
                } else {
                    $data_id = $_GET['id'];
                }
                $data = GetData("select * from users where use_id='" . $data_id . "'");
                $template = LoadTemplate("profile_top");
                print ReplaceContent( $data, $template);
            ?>
            <section>
            <?php
                if (IsMe()) echo"<a href='add_graphic.php' class='profile_underline add_graphic_here'><span class='fas fa-plus'></span></a>";
                $data = GetData("select * from graphic inner join users on gra_use_id = use_id where gra_use_id='" . $data_id . "' ORDER BY gra_uploaddate DESC");
                $template = LoadTemplate("index");
                print ReplaceContent( $data, $template);
            ?>
            </section>
        </div>
    <?php PrintFooter(); ?>
    </body>
</html>