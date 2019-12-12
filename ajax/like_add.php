<?php
include_once '../lib/autoload.php';

if (isset($_POST['gra_id'], $_SESSION['use']['use_id']) && graphic_exists($_POST['gra_id'])) {
    $gra_id = $_POST['gra_id'];
    if (previously_liked($gra_id) === true) {
        echo 'You\'ve already liked this';
    } else {
        add_like($gra_id);
        echo 'success';
    }
}
