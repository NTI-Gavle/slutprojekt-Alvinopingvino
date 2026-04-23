<?php
    include_once('db_connect.php');
    if (!isset($_SESSION)) {
        session_start();
    }

    $id = $_SESSION['user_id'];
    $stmt = $dbconn->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>