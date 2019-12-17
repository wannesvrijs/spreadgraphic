<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();

// ZOEKBALK
if(isset($_POST['search'])) {
    $searchq = $_POST['search'];
    $result = GetData ("SELECT * FROM graphic WHERE gra_tags LIKE '%$searchq%' ORDER BY gra_uploaddate DESC");
    if(!$result) {
       echo 'er loopt iets fout bij het zoeken';
    } else {
        echo 'als ik hier uitkom, klopt het!';
    }
    if($row['COUNT(*)'] == 0 ){
        $output = 'There are no results';
    } else {
        while($row = mysqli_fetch_assoc($data_search)) {
            $output .= ' wtf is dees';
       }
   }
}


//$timestamp = GetData("SELECT gra_uploaddate FROM graphic");
//date(F d, Y)

//$sql= "select gra_uploaddate from graphic where gra_id='" . $_GET['gra_id'] . "'";
//$timestamp= GetData($sql);
//$timestamp = date("F d, Y");
//var_dump($timestamp);


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
        $data = GetData("SELECT *, GROUP_CONCAT(mat_kind SEPARATOR ', ') as mat_kind
            FROM graphic
            inner join users on gra_use_id = use_id
            inner join gramat on gra_id = gramat_gra_id
            inner join material on gramat_mat_id = mat_id
            GROUP BY gra_id, gra_uploaddate
            ORDER BY gra_uploaddate DESC;");
        $template = LoadTemplate("index");
        print ReplaceContentindex( $data, $template);
        ?>
    </section>
</div>

<?php PrintFooter(); ?>
</body>
</html>
