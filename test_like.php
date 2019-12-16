<!--NOG NIET VERWIJDEREN !!!!!!!!!!!!!!!!  (tot nader order volgt) ;)-->

<?php
include "lib/autoload.php";
BasicHead();
?>

<body>
<section>
    <?php
    $data = GetData("select * from graphic inner join users on gra_use_id = use_id ORDER BY gra_uploaddate DESC");
    $template = LoadTemplate("index");
    print ReplaceContent( $data, $template);
    ?>
</section>
</body>
</html>