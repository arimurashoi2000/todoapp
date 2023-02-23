<?php
require_once('putTogether.php');

function TitleCheck($NewTaskTitle) {
    if ($NewTaskTitle == '') {
        echo 'タスク名が入力されていません';
    } else {
        echo 'タスク名<br>';
        echo $NewTaskTitle;
        echo '<br>';
    }
}

function ContentCheck($NewTaskContents) {
    if ($NewTaskContents == '') {
        echo '内容が入力されていません';
    } else {
        echo '内容<br>';
        echo $NewTaskContents;
        echo '<br>';
    }
}

function LengthCheck($NewTaskTitle) {
    $limit = 20;
    if (mb_strlen($NewTaskTitle) > $limit) {
        echo '文字数が20文字を超えています。';
    }
}
function CheckSend($file)
{
    if ($NewTaskTitle != '' || $NewTaskContents != '' || mb_strlen($NewTaskTitle) > 20) {
        echo '<form method="post" action="$file">';
        echo '<input type="hidden" name="newtask_code" value="'.$NewTaskNum.'">';
        echo '<input type="hidden" name="title" value="'.$NewTaskTitle.'">';
        echo '<input type="hidden" name="content" value="'.$NewTaskContents.'">';
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