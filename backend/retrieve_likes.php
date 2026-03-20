<?php
include_once(__DIR__ . '/base_url.php');
include_once('db_connect.php');

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_GET['post_id'])) {
    die('Post not found');
}

$stmt = $dbconn -> prepare('SELECT user_id FROM likes WHERE post_id = ?');
$stmt -> execute([$_GET['post_id']]);
$likes = $stmt -> fetchAll(PDO::FETCH_ASSOC);

$user_ids = array_column($likes, 'user_id');

echo(json_encode([
    "status" => (bool)in_array($_SESSION['user_id'], $user_ids),
    "likes" => count($likes)
]));