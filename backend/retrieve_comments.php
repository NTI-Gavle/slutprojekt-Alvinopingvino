<?php
include_once(__DIR__ . '/base_url.php');
include_once('db_connect.php');

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_GET['post_id'])) {
    die('Post not found');
}

$stmt = $dbconn -> prepare('SELECT comments.content, users.id, users.name, users.profile_pic 
FROM comments JOIN users ON comments.author = users.id WHERE comments.post_id = ? ORDER BY comments.id DESC');

$stmt -> execute([$_GET['post_id']]);
$comments = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo(json_encode($comments));
