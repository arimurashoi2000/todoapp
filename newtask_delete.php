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
    //$newtask_title = filter_input(INPUT_POST, 'title');
    $NewTaskNum = filter_input(INPUT_GET, 'ID');

    require_once('db_connect.php');
    db_connect();
    $dbh = db_connect();

    $sql = 'SELECT title, content FROM posts WHERE ID= :ID';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":ID", $NewTaskNum, PDO::PARAM_STR);
    $stmt->execute();

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $NewTaskTitle = $rec['title'];
    $NewTaskContents = $rec['content'];
} catch (Exception $e) {
    $e->getMessage();
    exit();
}


?>
<h1>
    ToDo Delete Page
</h1>
<form action="newtask_delete_check.php" method="post">
<input type="hidden" name="newtask_code" value="<?php echo $NewTaskNum;?>">
<div style="margin: 10px">
        <label for="title">タイトル：</label>
        <input type="text" name="title" value="<?php echo $NewTaskTitle;?>">
    </div>
    <div style="margin: 10px">
        <label for="content">内容：</label>
        <input type="text" name="content" value="<?php echo $NewTaskContents;?>">
        
    </div>
    <button type="submit" name="post">削除する</button>
    <button type="button" onclick="history.back()">戻る</button>
</form>

</body>
</html>