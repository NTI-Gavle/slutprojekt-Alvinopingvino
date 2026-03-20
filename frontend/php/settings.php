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
            <div style="width: 90%;">
                <div class="main">
                    <div style="text-align: center; margin: 20px">
                        <div class="align_center">
                            <div class="img_wrapper">
                                <img class="xlarge_pfp" src="../../backend/uploads/<?php echo (htmlspecialchars($user['profile_pic'])) ?>" alt="pfp">
                                <form action="../../backend/upload_pfp.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="image" id="fileInput" accept="image/*" style="display:none">
                                    <label for="fileInput" class="align_center btn edit_btn" name="image" accept="image/*" required>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </label>
                                </form>
                            </div>
                        </div>
                            <div>
                                <input class="form-control" maxlength="20" value="<?php echo (htmlspecialchars($user['name'])); ?>">
                                </input>
                            </div>
                    </div>
                    <div style="text-align: center;">
                        <button class="btn">Save</button>
                        <button class="btn">Sign out</button>
                    </div>
                </div>
            </div>
            <div style="width: 5%; min-width:57.33px;">
            </div>
        </div>

    </div>
</body>

</html>