<?php
include('../../backend/loggin_check.php');
include('../../backend/retrieve_settings.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">

    <!--Script-->
    <script src="../js/script.js"></script>

    <title>Settings</title>
</head>

<body onload="setupUpload()">
    <a href="#main-content" class="visually-hidden-focusable">
        Skip to main content
    </a>

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
            <main class="main" id="main-content" tabindex="-1">
                <div style="text-align: center; margin: 20px">
                    <div class="d-inline-flex align-items-center justify-content-center">
                        <div class="img_wrapper">
                            <img class="xlarge_pfp rounded-circle" src="../../backend/uploads/<?php echo (htmlspecialchars($user['profile_pic'])) ?>" alt="pfp">
                            <form action="../../backend/upload_pfp.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="image" id="fileInput" accept="image/*" style="display:none">
                                <label for="fileInput" class="d-inline-flex align-items-center justify-content-center btn edit_btn" name="image" accept="image/*" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                    </svg>
                                </label>
                            </form>
                        </div>
                    </div>
                    <div>
                        <input id="name_input" class="form-control" style="margin-top: 5px;" maxlength="20" value="<?php echo (htmlspecialchars($user['name'])); ?>" placeholder="username" aria-label="Username"></input>
                        <input id="email_input" class="form-control" style="margin-top: 5px;" maxlength="50" value="<?php echo (htmlspecialchars($user['email'])); ?>" placeholder="email adress" aria-label="Email address"></input>
                    </div>
                </div>
                <div style="text-align: center;">
                    <button class="btn" onclick="SaveSettings()">Save settings</button>
                    <p id="settings_error" class="text-danger"></p>
                    <p id="succeded" style="color:green;"></p>
                </div>
            </main>
            <div class="right">
            </div>
        </div>

    </div>
</body>

</html>