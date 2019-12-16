<?php
$register_form = true;
require_once "lib/autoload.php";

//redirect naar homepage als de gebruiker al ingelogd is
if ( isset($_SESSION['use']) ) { $_SESSION["msg"][] = "you are already logged in!"; header("Location: index.php"); exit; }

BasicHead();
ShowMessages();
?>
<body class="main page_register">
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