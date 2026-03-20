<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!(isset($_POST['content']) && isset($_POST['post_id']))) {
    Die('no comment or no post!');
}

$stmt = $dbconn->prepare('INSERT INTO comments(post_id, author, content) values(?, ?, ?)');
$stmt->execute([$_POST['post_id'], $_SESSION['user_id'], $_POST['content']]);