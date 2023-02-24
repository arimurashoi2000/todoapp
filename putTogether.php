<?php

$newTaskContents = filter_input(INPUT_POST, 'content');
$newTaskEdit = filter_input(INPUT_POST, 'edit');
$newTaskDelete = filter_input(INPUT_POST, 'delete');
$newTaskTitle = filter_input(INPUT_POST, 'title');
$newTaskNum = filter_input(INPUT_GET, 'ID');
$limit = 20;
$newTaskContents = htmlspecialchars($newTaskContents, ENT_QUOTES, 'UTF-8');
$newTaskTitle = htmlspecialchars($newTaskTitle, ENT_QUOTES, 'UTF-8');
$newTaskEdit = htmlspecialchars($newTaskEdit, ENT_QUOTES, 'UTF-8');
$newTaskDelete = htmlspecialchars($newTaskDelete, ENT_QUOTES, 'UTF-8');
$newTaskContents = htmlspecialchars($newTaskContents, ENT_QUOTES, 'UTF-8');
$newTaskNum = htmlspecialchars($newTaskNum, ENT_QUOTES, 'UTF-8');
