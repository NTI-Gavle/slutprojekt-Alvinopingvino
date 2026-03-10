<?php
include('../../backend/loggin_check.php');
include('../../backend/retrieve_profile.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">

    <title>Profile</title>
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
                        <img class="large_pfp" src="../../backend/uploads/<?php echo (htmlspecialchars($user['profile_pic'])) ?>" alt="pfp">
                        <h2>
                            <?php
                            echo(htmlspecialchars($user['name']));
                            echo('<p class="fs-6">#' . htmlspecialchars($user['id']) . '</p>');
                            ?>
                        </h2>
                    </div>
                    <?php
                    include('../../backend/retrieve_posts_by_user.php');
                    include('elements/feed.php');
                    ?>
                </div>
            </div>
            <div class="right">
            </div>
        </div>

    </div>
</body>

</html>