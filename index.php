<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();


?>

<body id="page_index">
<?php PrintNavBar(); ?>

<div class="container">
    <div class="zoekbalk">
        <form action="index.php" method="POST">
            <input type="text" name="search" placeholder="#">
            <button type="submit" name="submit_search" class="fas fa-search" ></button>
        </form>
    </div>
    <section>
        <?php
        //ZOEKBALK
        $sqljoin =  'inner join users on gra_use_id = use_id
                    inner join gramat on gra_id = gramat_gra_id
                    inner join material on gramat_mat_id = mat_id';
        if(isset($_POST['search'])) {
            $searchq = $_POST['search'];

            $data = GetData ("SELECT *, GROUP_CONCAT(mat_kind SEPARATOR ', ') as mat_kind FROM graphic $sqljoin WHERE gra_tags LIKE '%$searchq%' GROUP BY gra_id, gra_uploaddate ORDER BY gra_uploaddate DESC");
            $template = LoadTemplate("index");
            print ReplaceContentindex( $data, $template);

        } else {
            $data = GetData("select *, GROUP_CONCAT(mat_kind SEPARATOR ', ') as mat_kind from graphic $sqljoin GROUP BY gra_id, gra_uploaddate ORDER BY gra_uploaddate DESC");
            $template = LoadTemplate("index");
            print ReplaceContentindex( $data, $template);
        }
        ?>
    </section>
    <!-- go to top knop -->
    <a href="#" id="goToTop">
        <span class="fa fa-arrow-circle-up"></span>
    </a>
</div>

<?php PrintFooter(); ?>
</body>
</html>