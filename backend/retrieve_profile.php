<?php
include_once(__DIR__ . '/base_url.php');

if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!isset($_GET['user_id'])) {
    header('location: ' . BASE_URL . 'frontend/php/profile.php?user_id=' . $_SESSION['user_id']);
} 

$id = (int)$_GET['user_id'];
$stmt = $dbconn->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user == null){
    Die('User not found');
}
