<?php

$dateFormat = 'Y-m-d H:i:s';

// The array containing our menu
$menu = array(
    array(
        'name' => 'Home',
        'link' => 'index.php',
    ),
    array(
        'name' => 'Tasks',
        'link' => 'index.php?page=tasks&action=list',
    ),
    array(
        'name' => 'Finished tasks',
        'link' => 'finished_tasks.php',
    ),
    array(
        'name' => 'Statistics',
        'link' => 'statistics.php',
    ),
);

$tasks = array(
    array(        
        'id' => 1,
        'name' => 'Task 1',
        'description' => 'Description for task 1',
        'priority' => 'High',
        'created' => '2015-01-19 19:46',
        'dueDate' => '2015-01-20 19:56',
    ),
    array(
        'id' => 2,
        'name' => 'Task 2',
        'description' => 'Description for task 2',
        'priority' => 'Low',
        'created' => '2015-01-12 15:56',
        'dueDate' => '2015-01-21 09:00',
    ),
    array(
        'id' => 3,
        'name' => 'Task 3',
        'description' => 'Description for task 3',
        'priority' => 'Medium',
        'created' => '2015-01-17 12:45',
        'dueDate' => '2015-01-26 12:00',
    ),
);

$username = 'ME';