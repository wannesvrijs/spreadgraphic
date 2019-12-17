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
        if(isset($_POST['search'])) {
            $searchq = $_POST['search'];
            $result = GetData ("SELECT * FROM graphic WHERE gra_tags LIKE '%$searchq%' ORDER BY gra_uploaddate DESC");
            if(!$result) {
                $_POST["msg"][] = "There are no such tags!"; // dit werkt nog niet

                $data = GetData("select * from graphic inner join users on gra_use_id = use_id ORDER BY gra_uploaddate DESC");
                $template = LoadTemplate("index");
                print ReplaceContentindex( $data, $template);
            } else {
                $data = GetData ("SELECT * FROM graphic inner join users on gra_use_id = use_id WHERE gra_tags LIKE '%$searchq%' ORDER BY gra_uploaddate DESC");
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
            $data = GetData("select * from graphic inner join users on gra_use_id = use_id ORDER BY gra_uploaddate DESC");
            $template = LoadTemplate("index");
            print ReplaceContentindex( $data, $template);
        }

        ?>
    </section>
</div>

<?php PrintFooter(); ?>
</body>
</html>