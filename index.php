<?php
require_once "lib/autoload.php";
BasicHead();
ShowMessages();


//if(isset($_POST['search'])) {
//    $data_search = GetData ("SELECT * FROM graphic WHERE gra_tags LIKE '%$search%' OR  gra_description LIKE '%$search%' ORDER BY gra_uploaddate DESC");
//    if(!$query_results_search > 0){
//        echo "There are no results matching your search ";//
//    } else {
//        $template = LoadTemplate("index");
//        print ReplaceContent( $data, $template);
//    }
//}

//$output = '';

//if(isset($_POST['search'])) {
//    $searchq = $_POST['search'];
//    $result = GetData ("SELECT * FROM graphic WHERE gra_tags LIKE '%$searchq%' ORDER BY gra_uploaddate DESC");
//    $row = $result->fetch_assoc();
//    if(!$result) {
//       echo 'er loopt iets fout bij het zoeken';
//    }
//    if($row['COUNT(*)'] == 0 ){
//        $output = 'There are no results';
//    } else {
//        while($row = mysqli_fetch_assoc($data_search)) {
//            $output .= ' wtf is dees';
//       }
//   }
//}

//$timestamp = GetData("SELECT gra_uploaddate FROM graphic");
//date(F d, Y)

$sql= "select gra_uploaddate from graphic where gra_id='" . $_GET['gra_id'] . "'";
$timestamp= GetData($sql);
$timestamp = date("F d, Y");
var_dump($timestamp);


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


        $data = GetData("select * from graphic inner join users on gra_use_id = use_id ORDER BY gra_uploaddate DESC");
        $template = LoadTemplate("index");
        print ReplaceContentindex( $data, $template);
//        print ReplaceContent( $data, $template);
        ?>
    </section>
</div>

<?php PrintFooter(); ?>
</body>
</html>