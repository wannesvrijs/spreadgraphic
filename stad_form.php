<?php
require_once "lib/autoload.php";

BasicHead();
?>
<body>

<div class="jumbotron text-center">
    <h1>Formulier Stad</h1>
</div>

<div class="container">
    <div class="row">

        <?php
        echo $_GET["saveOK"];

        $data = GetData("select * from images where img_id=" . $_GET['id'] );
        $template = LoadTemplate("stad_form");
        print ReplaceContent( $data, $template);
        ?>

    </div>
</div>

</body>
</html>