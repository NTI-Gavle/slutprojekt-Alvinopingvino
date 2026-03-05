<?php
    include('db_connect.php');
    session_start();

    if (!(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))){
        header('location: ../frontend/php/sign_up.php');
        Die();
    }

    $stmt = $dbconn -> prepare('SELECT * FROM users WHERE name = ?');
    $stmt -> execute([$_POST['username']]);
    $user = $stmt -> fetch(PDO::FETCH_ASSOC);

    if ($user != null){
        $_SESSION['sign_up_error'] = "A user with that username already exists";
        header('location: ../frontend/php/sign_up.php');
        Die();
    }

    $stmt = $dbconn -> prepare('INSERT INTO users(name, email, password) values (?, ?, ?)');
    $stmt -> execute([$_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT)]);

    $_SESSION['user_id'] = $dbconn -> lastInsertId();

    if (isset($_SESSION['previous_page'])){
        header('location: ' . $_SESSION['previous_page']);
        unset($_SESSION['previous_page']);
        Die();
    }else{
        header('location: ../frontend/php/start.php');
        unset($_SESSION['previous_page']);
        Die();
    }
?>