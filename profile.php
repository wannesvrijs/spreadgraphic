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
                <div class="rondeimage">
                    <a href="artistpage.php"><img src="img/graphic9.jpg" alt="person"></a>
                </div>
                <!-- name and caption -->
                <div>
                    <p class="name">John Smit</p>
                    <p>Young designer form new york</p>
                </div>
                <!-- read more -->
                <div>
                    <a href="#">read more</a>
                </div>
                <!-- social media -->
                <div>
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
                <div class="add_graphic_here">
                    <a><span class="fas fa-plus"></span></a>
                </div>
                <?php
                print LoadTemplate("profile");
                ?>
            </section>


        </div>
    <?php PrintFooter(); ?>
    </body>
</html>