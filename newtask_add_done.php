<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>check Page</title>
</head>
<body>
<?php
try {
    require_once('putTogether.php');
    require_once('db_connect.php');
    db_connect();
    $dbh = db_connect();

    $sql ='INSERT INTO posts (title, content) VALUES (?,?)';
    $stmt = $dbh->prepare($sql);
    $data[]= $NewTaskTitle;
    $data[] = $NewTaskContents;
    $stmt->execute($data);

    $dbh = null;

    echo $NewTaskTitle.'<br>';
    echo $NewTaskContents.'<br>';
    echo 'を登録完了しました。';
    echo '<br>';
} catch (Exception $e) {
    $e->getMessage();
}
?>
<a href="list.php">戻る</a>
</body>
</html>