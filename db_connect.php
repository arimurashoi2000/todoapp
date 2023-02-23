<?php

function db_connect()
{
    $dbn = 'mysql:dbname=posts;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';

    try {
        $dbh = new PDO($dbn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (Exception $e) {
        $e->getMessage();
        die();
    }
}
