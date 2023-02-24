<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit done page</title></title>
</head>
<body>
<?php
try {
    require_once('putTogether.php');

    $NewTaskNum = filter_input(INPUT_POST, 'newtask_code');
    

    require_once('db_connect.php');
    db_connect();
    $dbh = db_connect();

    $sql = 'UPDATE posts SET title = :title, content = :content WHERE ID= :ID';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $newTaskTitle);
    $stmt->bindParam(':content', $newTaskContents);
    $stmt->bindParam(':ID', $newTaskNum, PDO::PARAM_STR);
    $stmt->execute();

    $dbh = null;
} catch (Exception $e) {
    $e->getMessage();
    exit();
}
?>
<p>ID:</p>
<?php echo $newTaskNum; ?>

<p>を修正しました</p>
<br>
<a href="list.php">戻る</a>


</body>
</html>