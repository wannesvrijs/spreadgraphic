<?php
$register_form = true;
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
?>
<body class="main">
<?php PrintNavBar(); ?>

<div class="container">
    <h1>New account</h1>

    <?php
    print LoadTemplate("register");
    ?>
    <?php PrintFooter(); ?>

</div>
</body>
</html>