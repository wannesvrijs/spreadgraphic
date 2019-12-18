<?php
require_once "lib/autoload.php";

//redirect naar homepage als de gebruiker al ingelogd is
if ( (!isset($_SESSION['use'])) and $_GET['id'] === null ) header("Location: index.php");


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
                $sqljoin =  'inner join users on gra_use_id = use_id
                    inner join gramat on gra_id = gramat_gra_id
                    inner join material on gramat_mat_id = mat_id';

                if (IsMe()) echo"<a href='add_graphic.php' class='profile_underline add_graphic_here'><span class='fas fa-plus'></span></a>";
                $data = GetData("SELECT *, GROUP_CONCAT(mat_kind SEPARATOR ', ') as mat_kind FROM graphic $sqljoin where gra_use_id = '".$data_id."'GROUP BY gra_id, gra_uploaddate ORDER BY gra_uploaddate DESC;");
                $template = LoadTemplate("profile");
                if (isset($_SESSION['use'])) echo ReplaceContentindex( $data, $template);
                else print ReplaceContent( $data, $template);
            ?>
            </section>
        </div>
    <?php PrintFooter(); ?>
    </body>
</html>