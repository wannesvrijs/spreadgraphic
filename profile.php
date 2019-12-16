<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();

$sql= "select * from users where use_id='" . $_SESSION['use']['use_id'] . "'";
$data= GetData($sql);

$use_firstname= $data[0]['use_firstname'];
$use_name= $data[0]['use_name'];
$use_picture= $data[0]['use_picture'];
$use_caption= $data[0]['use_caption'];
$use_education = $data[0]['use_education'];
$use_about = $data[0]['use_about'];
$use_instagram = $data[0]['use_instagram'];
$use_facebook = $data[0]['use_facebook'];

?>

<body id="page_profile">
<?php PrintNavBar(); ?>
        <div class="container">
            <div class="grid_artistpage">
                <!-- profile picture -->
                <div class="rondeimage profile_picture">
                    <img src="/wdev_wannes/spreadgraphic/profile_img/<?php echo $use_picture; ?>" alt="person">
                </div>
                <!-- name and caption -->
                <div class="profile_name">
                    <p class="name"><?php echo $use_firstname . ' ' . $use_name;?>
                        <a href="profile_adjust.php" title="settings from profile">
                            <span class="fas fa-cog"></span>
                        </a>
                    </p>
                    <p><?php echo $use_caption; ?></p>
                </div>
                <!-- read more -->
                <div class="profile_readmore">
                    <a class="readmore" href="#popup_readmore">read more</a>
                </div>

                <div id="popup_readmore" class="overlay">
                    <div class="popup">
                        <div class="rondeimage">
                            <img src="img/graphic2.jpg" alt="person">
                        </div>
                        <div class="popup_text">
                            <div class="education">
                                <h3>Education</h3>
                                <p><?php echo $use_education; ?></p>
                            </div>
                            <div class="about">
                                <h3>About</h3>
                                <p><?php echo $use_about; ?></p>
                            </div>
                        </div>
                        <a class="close" href="#">&times;</a>
                    </div>
                </div>
                <!-- social media -->
                <div class="profile_social">
                    <a href="<?php echo $use_facebook; ?>" title="" class="profile_underline">
                        <span class="fab fa-facebook-f"></span>
                        <span class="sr-only">Facebook pagina</span>
                    </a>
                    <a href="<?php echo $use_instagram; ?>" title="" class="profile_underline">
                        <span class="fab fa-instagram"></span>
                        <span class="sr-only">Instagram pagina</span>
                    </a>
                </div>
            </div>
            <section>
                <a href="add_graphic.php" class="profile_underline add_graphic_here">
                    <span class="fas fa-plus"></span>
                </a>
                <?php
                    $data = GetData("select * from graphic where gra_use_id='" . $_SESSION['use']['use_id'] . "' ORDER BY gra_uploaddate DESC");
                    $template = LoadTemplate("index");
                    print ReplaceContent( $data, $template);
                ?>
            </section>
        </div>

    <?php PrintFooter(); ?>
    </body>
</html>