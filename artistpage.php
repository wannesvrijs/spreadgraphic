    <?php
    require_once "lib/autoload.php";
    BasicHead();
    ShowMessages();
    ?>

    <body id="page_artistpage">
        <?php PrintNavBar(); ?>

        <div class="container">

                <?php
                print LoadTemplate("artistpage");
                ?>

        </div>
        <?php PrintFooter(); ?>

    </body>
</html>