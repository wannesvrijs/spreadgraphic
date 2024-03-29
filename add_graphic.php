<?php
require_once "lib/autoload.php";

//redirect naar homepage als de gebruiker al niemand is ingelogd
if ( ! isset($_SESSION['use']) ) { $_SESSION["msg"][] = "Create an account to add graphics!"; header("Location: index.php"); exit; }

BasicHead();
echo
    ShowMessages();
?>
<body class="main page_addgraphic">
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