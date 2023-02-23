<?php

$NewTaskContents = filter_input(INPUT_POST, 'content');
$NewTaskEdit = filter_input(INPUT_POST, 'edit');
$NewTaskDelete = filter_input(INPUT_POST, 'delete');
$NewTaskTitle = filter_input(INPUT_POST, 'title');
$NewTaskNum = filter_input(INPUT_GET, 'ID');
$limit = 20;

$NewTaskContents = htmlspecialchars($NewTaskContents, ENT_QUOTES, 'UTF-8');
$NewTaskTitle = htmlspecialchars($NewTaskTitle, ENT_QUOTES, 'UTF-8');
$NewTaskEdit = htmlspecialchars($NewTaskEdit, ENT_QUOTES, 'UTF-8');
$NewTaskDelete = htmlspecialchars($NewTaskDelete, ENT_QUOTES, 'UTF-8');
$NewTaskContents = htmlspecialchars($NewTaskContents, ENT_QUOTES, 'UTF-8');
$NewTaskNum = htmlspecialchars($NewTaskNum, ENT_QUOTES, 'UTF-8');
