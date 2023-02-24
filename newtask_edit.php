<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Page</title>
</head>
<body>
<?php

try {
    require_once('putTogether.php');
    require_once('db_connect.php');
    require_once('check.php');

    //$newtask_title = filter_input(INPUT_POST, 'title');
    $newTaskNum = filter_input(INPUT_GET, 'ID');

    db_connect();
    $dbh = db_connect();

    $sql = 'SELECT title, content FROM posts WHERE ID= :ID';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":ID", $newTaskNum, PDO::PARAM_STR);
    $stmt->execute();
} catch (Exception $e) {
    $e->getMessage();
    exit();
}
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$newTaskTitle = $rec['title'];
$newTaskContents = $rec['content'];

?>
<h1>
    ToDo edit Page
</h1>
<form action="newtask_edit_check.php" method="post">
<input type="hidden" name="newtask_code" value="<?php echo $newTaskNum;?>">
<div style="margin: 10px">
        <label for="title">タイトル：</label>
        <input type="text" name="title" value="<?php echo $newTaskTitle;?>">
    </div>
    <div style="margin: 10px">
        <label for="content">内容：</label>
        <textarea name="content" rows="8" cols="40"><?php echo $newTaskContents;?></textarea>
        
    </div>
    <input type="submit" name="post" value="編集する">
    <button type="button" name="back" onclick="history.back()">戻る</button>
</form>

</body>
</html>

