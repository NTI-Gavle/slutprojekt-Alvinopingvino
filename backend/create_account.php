<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('db_connect.php');

if (!(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))) {
    header('location: ../frontend/php/sign_up.php');
    die();
}

$stmt = $dbconn -> query('SELECT * FROM account_creation_timestamps WHERE ip="' . $_SERVER['REMOTE_ADDR'].'"');
$row = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($row != null) {
    $_SESSION['sign_up_error'] = "You're attempting to create accounts too quickly!";
    SendBack();
}

if ($user_by_name != null) {
    $_SESSION['sign_up_error'] = "A user with that username already exists";
    SendBack();
}

$stmt = $dbconn->prepare('SELECT * FROM users WHERE name = ?');
$stmt->execute([$_POST['username']]);
$user_by_name = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $dbconn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->execute([$_POST['email']]);
$user_by_email = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user_by_name != null) {
    $_SESSION['sign_up_error'] = "A user with that username already exists";
    SendBack();
}
if ($user_by_email != null) {
    $_SESSION['sign_up_error'] = "A user with that email already exists";
    SendBack();
}

$stmt = $dbconn->prepare('INSERT INTO users(name, email, password) VALUES (?, ?, ?)');
$stmt->execute([$_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT)]);
$_SESSION['user_id'] = $dbconn->lastInsertId();

$dbconn->query('INSERT INTO account_creation_timestamps(ip, timestamp) VALUES ("' . $_SERVER['REMOTE_ADDR'] . '",NOW())');

if (isset($_SESSION['previous_page'])) {
    header('location: ' . $_SESSION['previous_page']);
    unset($_SESSION['previous_page']);
    die();
} else {
    header('location: ../frontend/php/start.php');
    unset($_SESSION['previous_page']);
    die();
}

function SendBack(){
    header('location: ../frontend/php/sign_up.php');
    die();
}
