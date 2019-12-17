<?php
include "lib/autoload.php";
BasicHead();
?>

<body>
<section>
    <?php
    $data = GetData("select mat_kind from graphic
        inner join gramat on gra_id = gramat_gra_id
        inner join material on gramat_mat_id = mat_id
        ORDER BY gra_uploaddate DESC");
    $template = LoadTemplate("indextwee"); //TEMPLATE
    echo ReplaceContent( $data, $template);
    ?>
</section>
</body>
</html>