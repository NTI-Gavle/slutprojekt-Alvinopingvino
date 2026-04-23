<?php
require('../../backend/admin_check.php');
if ($is_admin == false) {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">

    <!--SCRIPT-->
    <script src="../js/script.js"></script>

    <title>Reported posts</title>
</head>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll("[id^='like_counter_']").forEach(el => {
            const postId = el.id.replace("like_counter_", "");
            RefreshLikes(postId);
        });

    });
</script>

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
            <main class="main" id="main-content" tabindex="-1">
                <?php
                include('../../backend/retrieve_reported_posts.php');
                include('elements/feed.php');
                ?>
            </main>
            <div class="right">
            </div>
        </div>

    </div>
</body>

</html>