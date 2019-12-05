<?php
$no_access = true;
require_once "lib/autoload.php";

BasicHead();

?>
<body>
<?php PrintNavBar(); ?>

<div class="jumbotron text-center">
    <h1>Geen toegang!</h1>
    <p>Gelieve eerst in te loggen</p>
</div>

<div class="container">

        <?php
        print LoadTemplate("no_access");
        ?>

</div>

</body>
</html>