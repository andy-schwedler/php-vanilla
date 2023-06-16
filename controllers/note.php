<?php

// Setup Database
$config = require('config.php');
$db = new Database($config['database']);

$heading = "Note";

$note =  $db->query('select * from Notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);


require('views/note.view.php');
