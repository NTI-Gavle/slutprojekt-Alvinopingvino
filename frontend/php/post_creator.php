<?php
include('../../backend/loggin_check.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">

    <title>Post creator</title>
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
            <div style="width: 90%;">
                <div class="main">
                    <div style="text-align: center; margin: 20px">
                        <h2>Create post</h2>
                    </div>
                    <div style="display: flex; justify-content:center;">
                        <form action="../../backend/publish_post.php" method="post" style="width:90%;">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" style="text-align: center" maxlength="100" name="title" placeholder="Title">
                            </div>
                            <div class="input-group mb-3">
                                <textarea type="text" class="form-control grow_with_text" style="min-height:200px;" name="content" placeholder="Content"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" class="btn submit_btn align_center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="width: 5%; min-width:57.33px;">
                </div>
            </div>

        </div>
</body>

</html>