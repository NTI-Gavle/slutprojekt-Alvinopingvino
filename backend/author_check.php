<?php
    include_once('db_connect.php');
    if (!isset($_SESSION)){
        session_start();
    }

    $is_author = false;

    if (isset($_SESSION['user_id']) && isset($_GET['post_id'])){
        $stmt = $dbconn -> query('SELECT author FROM posts WHERE id =' . $_GET['post_id']);
        $author = $stmt -> fetch(PDO::FETCH_ASSOC);
        if ($author['author'] == $_SESSION['user_id']){
            $is_author = true;
        }
    }
?>