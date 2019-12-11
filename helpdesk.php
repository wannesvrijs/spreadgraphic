<?php
require_once "lib/autoload.php";

//redirect naar homepage als de gebruiker al niemand is ingelogd
if ( ! isset($_SESSION['use']) ) { $_SESSION["msg"][] = "Create an account to add graphics!"; header("Location: index.php"); exit; }

BasicHead();
ShowMessages();
?>

<body>
<div class="container">
    <?php
    PrintNavBar(); //NAVIGATIE
    print LoadTemplate("helpdesk"); //TEMPLATE
    ?>
    <?php PrintFooter(); ?>

</div>


</body>
</html>