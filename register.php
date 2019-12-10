<?php
$register_form = true;
require_once "lib/autoload.php";

BasicHead();
?>
<body class="main">
<?php PrintNavBar(); ?>

<main class="container">
    <h1>New account</h1>

    <?php
    print LoadTemplate("register");
    ?>

</main>
<?php PrintFooter(); ?>
</body>
</html>