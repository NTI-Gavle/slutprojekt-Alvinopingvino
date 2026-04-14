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

    <!--SCRIPT-->
    <script src="../js/script.js" defer></script>

    <title><?php echo (htmlspecialchars($post['title'])); ?></title>
</head>

<body onload="RefreshLikes(<?php echo (htmlspecialchars($_GET['post_id'])) ?>), RefreshComments(<?php echo (htmlspecialchars($_GET['post_id'])) ?>)">
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
            <div style="width: 90%;">
                <main class="main" id="main-content" tabindex="-1">
                    <div class="text-center m-3">
                        <img class="xlarge_pfp rounded-circle" src="../../backend/uploads/<?php echo (htmlspecialchars($author['profile_pic'])) ?>" alt="Profile picture of <?php echo(htmlspecialchars($author['name']))?>">
                        <h2>
                            <a class="text-dark text-decoration-none" href="profile.php?user_id=<?php echo ($author['id']) ?>">
                                <?php
                                echo (htmlspecialchars($author['name']));
                                ?>
                            </a>
                        </h2>
                    </div>
                    <h3><?php echo (htmlspecialchars($post['title'])) ?></h3>
                    <div class="mb-3">
                        <?php echo ($post['content']) ?>
                    </div>
                    <div class="text-left d-flex">
                    <?php
                    if ($admin_check['is_admin'] == 1 || $post['author'] == $_SESSION['user_id']) {
                        echo ('
                            <button onclick="deletePost(' . $_GET['post_id'] . ')" class="btn text-danger me-1 d-inline-flex align-items-center justify-content-center" title="Delete post" aria-label="Delete post">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </button>
                        ');
                    }
                    ?>
                        <button id="like_btn_<?php echo(htmlspecialchars($post['id'])); ?>" class="btn d-inline-flex align-items-center justify-content-center" title="Like" onclick="Like(<?php echo ($_GET['post_id']) ?>)" aria-label="Like post"></button>
                        <p id="like_counter_<?php echo(htmlspecialchars($post['id'])); ?>" class="d-inline-flex align-items-center justify-content-center mb-0 ms-1"></p>
                    </div>
                    <?php
                        if ($admin_check['is_admin'] == 1 || $post['author'] == $_SESSION['user_id']) {
                            echo('                            
                            <p id="delete_error" class="text-danger"></p>
                            '); 
                        }
                    ?>
                    <HR>
                    <?php
                    include('elements/comment_section.php');
                    ?>
                </main>
            </div>
            <div class="right">
            </div>
        </div>

    </div>
</body>

</html>