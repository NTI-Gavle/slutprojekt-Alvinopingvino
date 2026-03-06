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
                                <button type="submit" class="btn submit_btn">Publish</button>
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