<?php
    include('db_connect.php');
    session_start();

    if (!(isset($_POST['email']) && isset($_POST['password']))){
        header('location: ../frontend/php/sign_in.php');
        Die();
    }

    $stmt = $dbconn -> prepare('SELECT * FROM users WHERE email = ?');
    $stmt -> execute([$_POST['email']]);
    $user = $stmt -> fetch();

    if ($user == null || !password_verify($_POST['password'], $user['password'])){
        $_SESSION['sign_in_error'] = "Couldn't find user with that e-mail address and password";
        header('location: ../frontend/php/sign_in.php');
        Die();
    } 
    
    $_SESSION['user_id'] = $user['id'];

    if (isset($_SESSION['previous_page'])){
        header('location: ' . $_SESSION['previous_page']);
        Die();
    }else{
        header('../frontend/php/start.php');
        Die();
    }
?>