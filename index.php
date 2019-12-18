<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();
//
//$timestamp = GetData("select gra_uploaddate, gra_id from graphic where gra_id = 2 ");
//var_dump($timestamp);
//
//$new_date = new DateTime($timestamp);
//echo $new_date->format('F d, Y');


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

        //ZOEKBALK
        if(isset($_POST['search'])) {
            $searchq = $_POST['search'];
            $result = GetData ("SELECT * FROM graphic WHERE gra_tags LIKE '%$searchq%'");
            if(!isset($result)) {
                $_POST["msg"][] = "There are no such tags!"; // dit werkt nog niet

                $data = GetData("select *, GROUP_CONCAT(mat_kind SEPARATOR ', ') as mat_kind from graphic $sqljoin GROUP BY gra_id, gra_uploaddate ORDER BY gra_uploaddate DESC");
                $template = LoadTemplate("index");
                print ReplaceContentindex( $data, $template);
            } else {
                $data = GetData ("SELECT *, GROUP_CONCAT(mat_kind SEPARATOR ', ') as mat_kind FROM graphic $sqljoin WHERE gra_tags LIKE '%$searchq%' GROUP BY gra_id, gra_uploaddate ORDER BY gra_uploaddate DESC");
                $template = LoadTemplate("index");
                print ReplaceContentindex( $data, $template);
            }
            if($row['COUNT(*)'] == 0 ){
                $output = 'There are no results';
            } else {
                while($row = mysqli_fetch_assoc($data_search)) {
                    $output .= ' wtf is dees';
                }
            }
        } else {
            $data = GetData("select * from graphic $sqljoin GROUP BY gra_id, gra_uploaddate ORDER BY gra_uploaddate DESC");
            $template = LoadTemplate("index");
            print ReplaceContentindex( $data, $template);
        }
        ?>
    </section>
</div>

<?php PrintFooter(); ?>
</body>
</html>