<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))) {
    header('location: ../frontend/php/sign_up.php');
    die();
}

$stmt = $dbconn->prepare('SELECT * FROM users WHERE name = ?');
$stmt->execute([$_POST['username']]);
$user_by_name = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $dbconn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->execute([$_POST['email']]);
$user_by_email = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user != null) {
    $_SESSION['sign_up_error'] = "A user with that username already exists";
    SendBack();
}
if ($user_by_email != null) {
    $_SESSION['sign_up_error'] = "A user with that email already exists";
    SendBack();
}

function SendBack(){
    header('location: ../frontend/php/sign_up.php');
    die();
}

$stmt = $dbconn->prepare('INSERT INTO users(name, email, password) values (?, ?, ?)');
$stmt->execute([$_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT)]);

$_SESSION['user_id'] = $dbconn->lastInsertId();

if (isset($_SESSION['previous_page'])) {
    header('location: ' . $_SESSION['previous_page']);
    unset($_SESSION['previous_page']);
    die();
} else {
    header('location: ../frontend/php/start.php');
    unset($_SESSION['previous_page']);
    die();
}
