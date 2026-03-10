<?php
include('../../backend/loggin_check.php');
include('../../backend/retrieve_post.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js" defer></script>

    <title><?php echo (htmlspecialchars($post['title'])); ?></title>
</head>

<body onload="RefreshLikes(<?php echo (htmlspecialchars($_GET['post_id'])) ?>), RefreshComments(<?php echo (htmlspecialchars($_GET['post_id'])) ?>)">
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
                        <img class="large_pfp" src="../../backend/uploads/<?php echo (htmlspecialchars($author['profile_pic'])) ?>" alt="pfp">
                        <h2>
                            <a class="username_link" href="profile.php?user_id=<?php echo ($author['id']) ?>">
                                <?php
                                echo (htmlspecialchars($author['name']));
                                ?>
                            </a>
                        </h2>
                    </div>
                    <h3><?php echo (htmlspecialchars($post['title'])) ?></h3>
                    <p><?php echo (htmlspecialchars($post['content'])) ?></p>
                    <?php
                    ?>
                    <div style="display: flex; align-items: left;">
                        <button id="like_btn" class="btn align_center" onclick="Like(<?php echo ($_GET['post_id']) ?>)"></button>
                        <p id="like_counter" class="align_center" style="margin: 0px;"></p>
                    </div>
                    <HR>
                    <?php
                    include('elements/comment_section.php');
                    ?>
                </div>
            </div>
            <div class="right">
            </div>
        </div>

    </div>
</body>

</html>