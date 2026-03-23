<?php

include_once('db_connect.php');
if (!isset($_SESSION)) {
    session_start();
}

if (!(isset($_POST['name']) && isset($_POST['email']))){
    echo('Both username and email must be set!');
    Die();
}

$email_error = null;
$name_error = null;
$succeded = null;

$stmt = $dbconn -> prepare('SELECT id FROM users WHERE email = ? AND id <> ?');
$stmt -> execute([$_POST['email'], $_SESSION['user_id']]);
$result_email = $stmt -> fetch(PDO::FETCH_ASSOC);

$stmt = $dbconn -> prepare('SELECT id FROM users WHERE name = ? AND id <> ?');
$stmt -> execute([$_POST['name'], $_SESSION['user_id']]);
$result_name = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($result_email == null && $result_name == null){
    $stmt = $dbconn -> prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
    $stmt -> execute([$_POST['name'], $_POST['email'], $_SESSION['user_id']]);
    $succeded = 'Saved!';
}

if ($result_email != null && $result_email['id'] != $_SESSION['user_id']){
    $email_error = 'User with that email already exists!';
}

if ($result_name != null && $result_name['id'] != $_SESSION['user_id']){
    $name_error = 'User with that name already exists!';
}

echo(json_encode([
    'email_error' => $email_error,
    'name_error' => $name_error,
    'succeded' => $succeded
]));