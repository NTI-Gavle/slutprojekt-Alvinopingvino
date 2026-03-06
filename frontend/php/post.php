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

    <title>Post</title>
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
                        <img class="pfp" src="../../backend/uploads/<?php echo ($author['profile_pic']) ?>" alt="pfp">
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
                </div>
            </div>
            <div style=" width: 5%; min-width:57.33px;">
            </div>
        </div>

    </div>
</body>

</html>