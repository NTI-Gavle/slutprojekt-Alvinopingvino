<?php
    include_once('db_connect.php');
    if (!isset($_SESSION)){
        session_start();
    }

    $stmt = $dbconn -> query('SELECT is_admin FROM users WHERE id =' . $_SESSION['user_id']);
    $admin_check = $stmt -> fetch(PDO::FETCH_ASSOC);
?>