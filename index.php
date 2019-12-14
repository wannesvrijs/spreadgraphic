<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
?>

<body id="page_index">
<?php PrintNavBar(); ?>

<div class="container">
    <div class="zoekbalk">
        <input type="text" placeholder="#">
    </div>
    <section>
        <?php
        $data = GetData("select * from graphic inner join users on gra_use_id = use_id ORDER BY gra_uploaddate DESC");
        $template = LoadTemplate("index");
        print ReplaceContent( $data, $template);
        ?>
    </section>
</div>

<?php PrintFooter(); ?>
</body>
</html>