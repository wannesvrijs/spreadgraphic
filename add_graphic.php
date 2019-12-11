<?php
require_once "lib/autoload.php";
ShowMessages();
BasicHead();
?>
<body class="main">
<?php PrintNavBar(); ?>

<main class="container">
    <h1>Add new graphic</h1>

    <?php
    print LoadTemplate("add_graphic");
    ?>

</main>
<?php PrintFooter(); ?>


</body>
</html>