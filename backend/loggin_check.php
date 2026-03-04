<?php
    include_once('base_url.php');
    session_start();
    if (!isset($_SESSION['user_id'])){
        header('location:' . BASE_URL . '/frontend/php/sign_in.php');
        Die();
    }
?>