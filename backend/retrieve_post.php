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
$stmt = $dbconn->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if ($post == null) {
    die('Post not found');
}

$stmt = $dbconn->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$post['author']]);
$author = $stmt->fetch(PDO::FETCH_ASSOC);

$post['content'] = htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8');
$post['content'] = preg_replace(
    '/\[img\](.*?)\[\/img\]/i',
    '<img src="'. BASE_URL .'backend/uploads/$1" alt="" class="post-img">',
    $post['content']
);