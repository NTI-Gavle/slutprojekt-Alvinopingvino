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
$stmt->execute([$_SESSION['user_id'], $_POST['title'], $_POST['content']]);

$post_id = $dbconn -> lastInsertId();

var_dump($_FILES);

if (!empty($_FILES['image']['name'][0])) {

    $allowed = ["jpg", "jpeg", "png", "gif"];

    foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {

        $tmp  = $_FILES['image']['tmp_name'][$key];
        $error = $_FILES['image']['error'][$key];
        $type = mime_content_type($tmp);
        $ext = strtolower(explode('/', $type)[1]);
        
        if (!in_array($ext, $allowed) || $error !== 0){
            continue;
        }
        
        echo('uploaded file!');

        $newName = uniqid("img_", true) . "." . $ext;
        move_uploaded_file($tmp, "uploads/" . $newName);

        $stmt = $dbconn -> prepare('INSERT INTO files (post_id, file) VALUES (?, ?)');
        $stmt -> execute([$post_id, $newName]);
    }
}

header('location: ../frontend/php/start.php');
