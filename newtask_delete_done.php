<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete done page</title>
</head>
<body>
<?php
try {
    require_once('putTOgether.php');
    require_once('db_connect.php');
    $NewTaskNum = filter_input(INPUT_POST, 'newtask_code');

    db_connect();
    $dbh = db_connect();

    $sql = 'DELETE FROM posts WHERE ID= :ID';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":ID", $newTaskNum, PDO::PARAM_STR);
    $stmt->execute();
} catch (Exception $e) {
    exit($e->getMessage());
}
?>
<?php echo $newTaskTitle; ?>
<p>を削除しました</p>
<br>
<a href="list.php">戻る</a>
</body>
</html>