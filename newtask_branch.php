<?php
$newtask_edit = filter_input(INPUT_POST, 'edit');
$newtask_delete = filter_input(INPUT_POST, 'delelte');

if (isset($newtask_edit) == true) {
    $newtask_num = filter_input(INPUT_POST, 'newtask_code');
    header('Location: newtask_edit.php?newtask_code='.$newtasknum);
    exit();
}

if (isset($newtask_delete) == true) {
    $newtask_num = filter_input(INPUT_POST, 'newtask_code');
    header('Location: newtask_delete.php?newtask_code='.$newtasknum);
}
?>