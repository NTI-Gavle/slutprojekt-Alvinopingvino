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
        <div class="d-flex flex-grow-1" style="min-height:0px;">
            <div class="bg-body-tertiary left">
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
                        <div class="input-group mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn">Sign up</button>
                        </div>
                    </form>
                </div>
                <?php
                    if (isset($_SESSION['sign_up_error'])) {
                        echo ('<p class="text-danger">' . $_SESSION['sign_up_error'] . '</p>');
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