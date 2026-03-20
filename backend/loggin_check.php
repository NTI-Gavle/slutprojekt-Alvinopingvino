<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('base_url.php');
if (!isset($_SESSION['user_id'])) {
    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
    header('location:' . BASE_URL . '/frontend/php/sign_in.php');
    die();
}
