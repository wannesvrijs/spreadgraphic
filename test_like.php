<!--NOG NIET VERWIJDEREN !!!!!!!!!!!!!!!!  (tot nader order volgt) ;)-->

<?php
include "lib/autoload.php";
BasicHead();
?>

<body>
<?php

$data = GetData("select * from graphic ORDER BY gra_uploaddate DESC");
$template = LoadTemplate("indextwee");
print ReplaceContent( $data, $template);


;

?>
</body>
</html>