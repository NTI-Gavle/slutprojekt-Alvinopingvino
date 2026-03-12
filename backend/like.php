<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');
include('loggin_check.php');

if (!(isset($_GET['post_id']))) {
    die('No post!');
}

$stmt = $dbconn->prepare('SELECT * FROM likes WHERE user_id = ? AND post_id = ?');
$stmt->execute([$_SESSION['user_id'], $_GET['post_id']]);
$like = $stmt->fetch(PDO::FETCH_ASSOC);

if ($like == null) {
    $stmt = $dbconn->prepare('INSERT INTO likes (post_id, user_id) VALUES (?, ?)');
    $stmt->execute([$_GET['post_id'], $_SESSION['user_id']]);
    echo('liked');
}else{
    $stmt = $dbconn->prepare('DELETE FROM likes WHERE user_id = ? AND post_id = ?');
    $stmt->execute([$_SESSION['user_id'], $_GET['post_id']]);
    echo('unliked');
}