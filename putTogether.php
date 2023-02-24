<?php

$newTaskContents = filter_input(INPUT_POST, 'content');
$newTaskEdit = filter_input(INPUT_POST, 'edit');
$newTaskDelete = filter_input(INPUT_POST, 'delete');
$newTaskTitle = filter_input(INPUT_POST, 'title');
$newTaskNum = filter_input(INPUT_GET, 'ID');
$limit = 20;

$newTaskContents = htmlspecialchars($NewTaskContents, ENT_QUOTES, 'UTF-8');
$newTaskTitle = htmlspecialchars($NewTaskTitle, ENT_QUOTES, 'UTF-8');
$newTaskEdit = htmlspecialchars($NewTaskEdit, ENT_QUOTES, 'UTF-8');
$newTaskDelete = htmlspecialchars($NewTaskDelete, ENT_QUOTES, 'UTF-8');
$newTaskContents = htmlspecialchars($NewTaskContents, ENT_QUOTES, 'UTF-8');
$newTaskNum = htmlspecialchars($NewTaskNum, ENT_QUOTES, 'UTF-8');
