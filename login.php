<?php
$login_form = true;
require_once "lib/autoload.php";

//redirect naar homepage als de gebruiker al ingelogd is
if ( isset($_SESSION['use']) ) { $_SESSION["msg"][] = "U bent al ingelogd!"; header("Location: index.php"); exit; }

BasicHead();
ShowMessages();
?>
<body class="main loginbody">
<?php PrintNavBar(); ?>

<main class="container">
    <h1>Welcome back!</h1>

    <?php
    print LoadTemplate("login");
    ?>

</main>
<footer></footer>

</body>
</html>