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
require_once('putTogether.php');

if ($NewTaskTitle == '') {
    echo 'タスク名が入力されていません';
    echo '<br>';
} else {
    echo 'タスク名<br>';
    echo $NewTaskTitle;
    echo '<br>';
}

if ($NewTaskContents == '') {
    echo '内容が入力されていません';
} else {
    echo '内容';
    echo '<br>';
    echo $NewTaskContents;
    echo '<br>';
}

if ($NewTaskTitle != '' || $NewTaskContents != '') {
    echo '<form method="post" action="newtask_add_done.php">';
    echo '<input type="hidden" name="title" value="'.$NewTaskTitle.'">';
    echo '<input type="hidden" name="contents" value="'.$NewTaskContents.'">';
    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '<input type="submit" value="登録">';
    echo '</form>';
} else {
    echo '<form>';
    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '</form>';
}
?>
</body>
</html>