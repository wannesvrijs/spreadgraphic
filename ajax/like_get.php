<?php
include_once '../lib/autoload.php';

if (isset($_POST['gra_id'], $_SESSION['use']['use_id']) && graphic_exists($_POST['gra_id'])) {
    echo like_count($_POST['gra_id']);
}
