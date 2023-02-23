<?php

try {
    require_once('putTogether.php');
    require_once('db_connect.php');

    $SerchWord = filter_input(INPUT_POST, 'serch_word');
    $Serch = filter_input(INPUT_POST, 'serch');

    db_connect();
    $dbh = db_connect();

    $sql = 'SELECT * FROM posts';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
} catch(Exception $e) {
    $e->getMessage();
    exit();
}
