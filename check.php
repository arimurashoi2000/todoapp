<?php
require_once('putTogether.php');

function TitleCheck($newTaskTitle) {
    if ($newTaskTitle == '') {
        echo 'タスク名が入力されていません';
        echo '<br>';
    } else {
        echo 'タスク名<br>';
        echo $newTaskTitle;
        echo '<br>';
    }
}

function ContentCheck($newTaskContents) {
    if ($newTaskContents == '') {
        echo '内容が入力されていません';
        echo '<br>';
    } else {
        echo '内容<br>';
        echo $newTaskContents;
        echo '<br>';
    }
}

function LengthCheck($newTaskTitle) {
    $limit = 20;
    if (mb_strlen($newTaskTitle) > $limit) {
        echo '文字数が20文字を超えています。';
        echo '<br>';
    }
}
function CheckSend($file)
{
    if ($newTaskTitle != '' || $newTaskContents != '' || mb_strlen($newTaskTitle) > 20) {
        echo '<form method="post" action="$file">';
        echo '<input type="hidden" name="newtask_code" value="'.$newTaskNum.'">';
        echo '<input type="hidden" name="title" value="'.$newTaskTitle.'">';
        echo '<input type="hidden" name="content" value="'.$newTaskContents.'">';
        echo '<input type="submit" name="post" value="編集する">';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '</form>';
    } else {
        echo '<form>';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '</form>';
    }
}
?>