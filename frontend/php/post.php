<?php
include('../../backend/loggin_check.php');
include('../../backend/retrieve_post.php');
include('../../backend/admin_check.php');
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
        <div class="d-flex flex-grow-1" style="min-height:0px;">
            <div class="bg-body-tertiary left">
                <?php
                include('elements/menu.php')
                ?>
            </div>
            <div style="width: 90%;">
                <div class="main">
                    <div class="text-center m-3">
                        <img class="xlarge_pfp rounded-circle" src="../../backend/uploads/<?php echo (htmlspecialchars($author['profile_pic'])) ?>" alt="pfp">
                        <h2>
                            <a class="text-dark text-decoration-none" href="profile.php?user_id=<?php echo ($author['id']) ?>">
                                <?php
                                echo (htmlspecialchars($author['name']));
                                ?>
                            </a>
                        </h2>
                    </div>
                    <h3><?php echo (htmlspecialchars($post['title'])) ?></h3>
                    <p><?php echo (htmlspecialchars($post['content'])) ?></p>
                    <div class="d-flex flex-wrap justify-content-center w-100 mb-3">
                        <?php
                        foreach ($files as $img) {
                            echo ('<img class="m-1 rounded" src="../../backend/uploads/' . $img . '" style="max-height: 200px;">');
                        }
                        ?>
                    </div>
                    <div class="text-left d-flex">
                        <button id="like_btn" class="btn d-inline-flex align-items-center justify-content-center" onclick="Like(<?php echo ($_GET['post_id']) ?>)"></button>
                        <p id="like_counter" class="d-inline-flex align-items-center justify-content-center mb-0 ms-1"></p>
                    </div>
                    <?php
                    if ($admin_check['is_admin'] == 1 || $post['author'] == $_SESSION['user_id']) {
                        echo ('
                        <div class="mt-1">
                            <button onclick="deletePost(' . $_GET['post_id'] . ')" class="btn text-danger mr-1">Delete Post</button>
                            <p id="delete_error" class="text-danger"></p>
                        </div>');
                    }
                    ?>
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