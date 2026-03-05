<?php
include('db_connect.php');
include_once('base_url.php');

if (isset($_GET['search'])){
    $stmt = $dbconn->prepare("
    SELECT *,
    (title LIKE ?) AS exact_score,
    MATCH(title, content) AGAINST(? IN BOOLEAN MODE) AS score
    FROM posts
    ORDER BY exact_score DESC, score DESC");

    $stmt -> execute([$_GET['search'], $_GET['search']]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else{
    $stmt = $dbconn->query('SELECT * FROM posts ORDER BY id DESC');
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC); 
}