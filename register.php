<?php
$register_form = true;
require_once "lib/autoload.php";

BasicHead();
?>
<body class="main">

<main class="container">
    <h1>New account</h1>

    <?php
    print LoadTemplate("register");
    ?>

</main>
<footer></footer>

</body>
</html>