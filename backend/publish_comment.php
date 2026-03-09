<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!(isset($_POST['content']) && isset($_GET['post_id']))) {
    //header('loaction: ../frontent/php/start.php');
    Die('no comment or no post!');
}

$stmt = $dbconn->prepare('INSERT INTO comments(post, author, content) values(?, ?, ?)');
$stmt->execute([$_GET['post_id'], $_SESSION['user_id'], $_POST['content']]);

header('location: ' . $_SESSION['previous_page']);
