<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();

echo var_dump($_SESSION['use']);
?>
<body class="main">
<?php PrintNavBar(); ?>

<main class="container">
    <h1>Add new graphic</h1>

    <?php
    print LoadTemplate("add_graphic");
    ?>

</main>
<footer></footer>

</body>
</html>