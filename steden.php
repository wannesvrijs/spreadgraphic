<?php
require_once "lib/autoload.php";

BasicHead();
ShowMessages();
?>
<body>

<div class="jumbotron text-center">
    <h1>Leuke plekken in Europa</h1>
    <p>Tips voor citytrips voor vrolijke vakantiegangers!</p>
</div>

<?php PrintNavBar(); ?>

<div class="container">
    <div class="row">

        <?php
        $data = GetData("select * from images");
        $template = LoadTemplate("steden");
        print ReplaceContent( $data, $template);
        ?>

    </div>
</div>

</body>
</html>