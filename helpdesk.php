<?php
require_once "lib/autoload.php";

//redirect naar homepage als de gebruiker al niemand is ingelogd
if ( ! isset($_SESSION['use']) ) { $_SESSION["msg"][] = "Create an account to add your question!"; header("Location: index.php"); exit; }

BasicHead();
ShowMessages();
?>

<body>
<?php PrintNavBar();?>
<main class="container container_helpdesk">
    <h1>Questions or remarks...?</h1>
    <?php
    print LoadTemplate("helpdesk"); //TEMPLATE
    ?>
</main>
    <?php PrintFooter(); ?>


</body>
</html>