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
            <main class="main" id="main-content">
                <div class="text-center m-3">
                    <img class="xlarge_pfp rounded-circle" src="../../backend/uploads/<?php echo (htmlspecialchars($user['profile_pic'])) ?>" alt="pfp">
                    <h2>
                        <?php
                        echo (htmlspecialchars($user['name']));
                        echo ('<p class="fs-6">#' . htmlspecialchars($user['id']) . '</p>');
                        ?>
                    </h2>
                </div>
                <?php
                include('../../backend/retrieve_posts_by_user.php');
                include('elements/feed.php');
                ?>
            </main>
            <div class="right">
            </div>
        </div>

    </div>
</body>

</html>