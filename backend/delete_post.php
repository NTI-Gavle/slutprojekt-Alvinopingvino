<?php
include('admin_check.php');
include('db_connect.php');

if (!isset($_GET['post_id'])) {
    die();
}

$post_id = $_GET['post_id'];

$stmt = $dbconn -> prepare('SELECT author FROM posts WHERE id = ?');
$stmt -> execute([$post_id]);
$author = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($admin_check['is_admin'] == 1 || $author['author'] == $_SESSION['user_id']) {

    $stmt = $dbconn->prepare('DELETE FROM likes WHERE post_id = ?');
    $stmt->execute([$post_id]);

    $stmt = $dbconn->prepare('DELETE FROM comments WHERE post_id = ?');
    $stmt->execute([$post_id]);

    $stmt = $dbconn->prepare('DELETE FROM posts WHERE id = ?');
    $stmt->execute([$post_id]);
}else{
    die('You dont have permision to execute this task!');
}
