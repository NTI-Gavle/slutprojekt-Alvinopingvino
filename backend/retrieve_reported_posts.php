<?php
    include_once('db_connect.php');
    $stmt = $dbconn->query('SELECT * FROM posts WHERE reports > 0 ORDER BY reports');
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>