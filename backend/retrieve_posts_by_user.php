<?php
    include_once('db_connect.php');
    $stmt = $dbconn->prepare('SELECT * FROM posts WHERE author = ? ORDER BY id DESC');
    $stmt -> execute([$_GET['user_id']]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>