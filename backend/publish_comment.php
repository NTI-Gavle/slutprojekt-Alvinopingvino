<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!isset($_POST['comment'])) {
    header('loaction: ../frontent/php/start.php');
}

$stmt = $dbconn->prepare('INSERT INTO comments(post, author, content) values(?, ?, ?)');
$stmt->execute([$_POST['post'], $_SESSION['user_id'], $_POST['content']]);

header('location: ' . $_SESSION['previous_page']);
