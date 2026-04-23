<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!(isset($_POST['title']) && isset($_POST['content']))) {
    header('loaction: ../frontend/php/post_creator.php');
    die();
}

if (!isset($_SESSION['user_id'])){
    die();
}

$stmt = $dbconn->prepare('INSERT INTO posts(author, title, content) values(?, ?, ?)');
$stmt->execute([$_SESSION['user_id'], $_POST['title'], $_POST['content']]);

$post_id = $dbconn -> lastInsertId();

header('location: ../frontend/php/start.php');
