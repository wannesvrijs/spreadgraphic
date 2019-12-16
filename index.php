<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();


if(isset($_POST['submit_search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql_search = "SELECT * FROM graphic WHERE gra_tags LIKE '%$search%' OR  gra_description LIKE '%$search%' ORDER BY gra_uploaddate DESC";

}






?>

<body id="page_index">
<?php PrintNavBar(); ?>

<div class="container">
    <div class="zoekbalk">
        <form action="index.php" method="POST">
            <input type="text" name="search" placeholder="#">
            <button type="submit" name="submit_search"></button>
        </form>
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