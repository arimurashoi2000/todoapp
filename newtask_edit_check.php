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
require_once('check.php');
$newTaskNum = filter_input(INPUT_POST, 'newtask_code');
$newTaskNum = htmlspecialchars($newTaskNum, ENT_QUOTES, 'UTF-8');

try {
    TitleCheck($newTaskTitle);
    ContentCheck($newTaskContents);
    LengthCheck($newTaskTitle);
    //titleとcontentがあってタイトル<20
    if ($newTaskTitle != '' && $newTaskContents != '' && mb_strlen($newTaskTitle)  < $limit) {
        echo '<form method="post" action="newtask_edit_done.php">';
        echo '<input type="hidden" name="newtask_code" value="'.$newTaskNum.'">';
        echo '<input type="hidden" name="title" value="'.$newTaskTitle.'">';
        echo '<input type="hidden" name="content" value="'.$newTaskContents.'">';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '<input type="submit" value="OK">';
        echo '</form>';
    } else {
        echo '<form>';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '</form>';
    }
    
} catch (Exception $e) {
    exit($e->getMessage());
}
?>
</body>
</html>