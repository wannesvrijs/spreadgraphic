<?php
require_once "lib/autoload.php";

//redirect naar homepage als niemand is ingelogd
if ( ! isset($_SESSION['use']) ) { $_SESSION["msg"][] = "Create an account before sending us your questions!"; header("Location: index.php"); exit; }

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