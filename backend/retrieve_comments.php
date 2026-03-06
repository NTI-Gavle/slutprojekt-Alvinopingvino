<?php
include_once(__DIR__ . '/base_url.php');
include_once('db_connect.php');

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_GET['post_id'])) {
    die('Post not found');
}

$id = (int)$_GET['post_id'];
$stmt = $dbconn -> prepare('SELECT * FROM comments WHERE post = ?');
$stmt -> execute([$id]);
$comments = $stmt -> fetchAll(PDO::FETCH_ASSOC);
