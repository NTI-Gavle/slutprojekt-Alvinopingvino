<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!(isset($_POST['title']) && isset($_POST['content']))) {
    header('loaction: ../frontend/php/post_creator.php');
    die();
}

$stmt = $dbconn->prepare('INSERT INTO posts(author, title, content) values(?, ?, ?)');
$stmt->execute([$_SESSION['user_id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content'])]);

$post_id = $dbconn -> lastInsertId();

var_dump($_FILES);

if (!empty($_FILES['image']['name'][0])) {
    
}

header('location: ../frontend/php/start.php');
