<?php
function GetConnection()
{
//    $dsn = "mysql:host=localhost;dbname=spreadgraphic";
//    $user = "root";
//    $passwd = "mysql";

    $dsn = "mysql:host=185.115.218.166;dbname=wdev_wannes";
    $user = "wdev_wannes";
    $passwd = "7VUTt7FOcAY1";

    $pdo = new PDO($dsn, $user, $passwd);
    return $pdo;
}

function GetData( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);
    $stm->execute();

    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function ExecuteSQL( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);

    if ( $stm->execute() ) return true;
    else return false;
}

