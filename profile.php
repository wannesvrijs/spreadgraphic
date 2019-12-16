<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();

$sql= "select * from users where use_id='" . $_SESSION['use']['use_id'] . "'";
$data= GetData($sql);
var_dump($data);

//$sql= "select * from users where use_id=5";  //moet verwijzen naar een $_session id

//var_dump($data);
//$use_firstname= $data[0]['use_firstname'];
//$use_name= $data[0]['use_name'];
//$use_firstname= $data[0]['use_firstname'];

?>

<body id="page_profile">
<?php PrintNavBar(); ?>
        <div class="container">
            <div class="grid_artistpage">
                <!-- profile picture -->
                <div class="rondeimage profile_picture">
                    <img src="@@use_picture@@" alt="person">
                </div>
                <!-- name and caption -->
                <div class="profile_name">
                    <p class="name">@@use_firstname@@ @@use_name@@</p>
                    <p>@@use_caption@@</p>
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
                                <p>@@use_education@@</p>
                            </div>
                            <div class="about">
                                <h3>About</h3>
                                <p>@@use_about@@</p>
                            </div>
                        </div>
                        <a class="close" href="#">&times;</a>
                    </div>
                </div>
                <!-- social media -->
                <div class="profile_social">
                    <a href="#" title="" class="profile_underline">
                        <span class="fab fa-facebook-f"></span>
                        <span class="sr-only">Facebook pagina</span>
                    </a>
                    <a href="#" title="" class="profile_underline">
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
$data = GetData("select * from users where img_id=" . $_GET['id'] );
$template = LoadTemplate("index");
print ReplaceContent( $data, $template);
?>
            </section>


        </div>
<?php PrintFooter(); ?>
    </body>
</html>