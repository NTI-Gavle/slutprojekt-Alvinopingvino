<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!(isset($_GET['post_id']))) {
    die('No post!');
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

$stmt = $dbconn->prepare('SELECT * FROM likes WHERE user_id = ? AND post_id = ?');
$stmt->execute([$_SESSION['user_id'], $_GET['post_id']]);
$like = $stmt->fetch(PDO::FETCH_ASSOC);

if ($like == null) {
    $stmt = $dbconn->prepare('INSERT INTO likes (post_id, user_id) VALUES (?, ?)');
    $stmt->execute([$_GET['post_id'], $_SESSION['user_id']]);
}else{
    $stmt = $dbconn->prepare('DELETE FROM likes WHERE user_id = ? AND post_id = ?');
    $stmt->execute([$_SESSION['user_id'], $_GET['post_id']]);
}