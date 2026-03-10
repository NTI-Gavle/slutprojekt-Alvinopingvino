<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">

    <title>Sign up</title>
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <?php
        include('elements/header.php');
        ?>
        <div class="page flex-grow-1">
            <div class="bg-body-tertiary" style="width: 5%; min-width: 57.33px; border-right: 1px solid lightgray;">
                <?php
                include('elements/menu.php')
                ?>
            </div>
            <div class="main" style="text-align: center;">
                <div style="text-align: center; margin: 20px">
                    <h2>Sign up</h2>
                </div>
                <div style="display: flex; justify-content:center;">
                    <form action="../../backend/create_account.php" method="post" style="width:90%;">
                        <div class="input-group mb-3">
                            <input style="text-align: center;" type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <input style="text-align: center;" type="email" class="form-control" name="email" placeholder="E-mail address">
                        </div>
                        <div class="input-group mb-3">
                            <input style="text-align: center;" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn submit_btn">Sign up</button>
                        </div>
                    </form>
                </div>
                <?php
                    if (isset($_SESSION['sign_up_error'])) {
                        echo ('<p class="error_message">' . $_SESSION['sign_up_error'] . '</p>');
                        unset($_SESSION['sign_up_error']);
                    }
                ?>
                    <p>Already have an account? Sign in <a href="sign_in.php">here</a>!</p>
            </div>
            <div class="right">
            </div>
        </div>

    </div>
</body>

</html>