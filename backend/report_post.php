<?php
require('db_connect.php');
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_GET['post_id'])){
    die('Require post_id to execute this task');
}

if (!isset($_SESSION['user_id'])){
    echo(json_encode([
        'signed_in' => false
    ]));
    die();
}else{
    echo(json_encode([
        'signed_in' => true
    ]));
}

$dbconn -> query('UPDATE posts SET reports = reports + 1 WHERE id =' . $_GET['post_id']);
