<?php
require_once "pdo_info.php";

function GetConnection()
{
    global $dsn, $user, $passwd;
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

function GetInsertedId( $sql )
{
    $conn = GetConnection();
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // use exec() because no results are returned
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    return $last_id;
}