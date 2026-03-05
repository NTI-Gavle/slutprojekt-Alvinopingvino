<?php
    include_once('base_url.php');
    session_start();
    if (!isset($_SESSION['user_id'])){
        session_start();
        $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
        header('location:' . BASE_URL . '/frontend/php/sign_in.php');
        Die();
    }
?>