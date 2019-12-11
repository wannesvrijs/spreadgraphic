<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
?>

<body id="page_profile">
<?php PrintNavBar(); ?>
        <div class="container">
            <div class="grid_artistpage">
                <!-- profile picture -->
                <div class="rondeimage profile_picture">
                    <img src="img/graphic9.jpg" alt="person">
                </div>
                <!-- name and caption -->
                <div class="profile_name">
                    <p class="name">John Smit</p>
                    <p>Young designer form new york</p>
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
                            <p>Texas Art Institute</p>
                        </div>
                        <div class="about">
                            <h3>About</h3>
                            <p>I’m feeling so cool Top to the bottom, just cool Every little thing that I do Dammit, I’m feelin’ so cool, yeah Woke up feelin’ like a new James Dean I comb my hair like an old-school Sheen I’m feelin’ high like a late night summer of last year, yeah Standin’ there with the red dress on you A Killer Queen like a young Jane Fonda Is it me, or am I just havin’ a good year?</p>
                        </div>

                        </div>


                        <a class="close" href="#">&times;</a>
                    </div>
                </div>
                <!-- social media -->
                <div class="profile_social">
                    <a href="#" title="">
                        <span class="fab fa-facebook-f"></span>
                        <span class="sr-only">Facebook pagina</span>
                    </a>
                    <a href="#" title="">
                        <span class="fab fa-instagram"></span>
                        <span class="sr-only">Instagram pagina</span>
                    </a>
                </div>
            </div>
            <section>
                <a href="add_graphic.php">
                    <div class="add_graphic_here">
                        <span class="fas fa-plus"></span>
                    </div>
                </a>

<?php
print LoadTemplate("profile");
?>
            </section>


        </div>
<?php PrintFooter(); ?>
    </body>
</html>