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

    <title>Settings</title>
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

                </div>
            </div>
            <div style="width: 5%; min-width:57.33px;">
            </div>
        </div>

    </div>
</body>

</html>