<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!(isset($_POST['email']) && isset($_POST['password']))) {
    header('location: ../frontend/php/sign_in.php');
    die();
}

$stmt = $dbconn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->execute([$_POST['email']]);
$user = $stmt->fetch();

if ($user == null || !password_verify($_POST['password'], $user['password'])) {
    $_SESSION['sign_in_error'] = "Couldn't find user with that e-mail address and password";
    header('location: ../frontend/php/sign_in.php');
    die();
}

$_SESSION['user_id'] = $user['id'];

if (isset($_SESSION['previous_page'])) {
    header('location: ' . $_SESSION['previous_page']);
    die();
} else {
    header('../frontend/php/start.php');
    die();
}
