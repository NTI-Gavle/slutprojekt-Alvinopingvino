<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">

    <title>Home</title>
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <?php
        include('elements/header.php');
        ?>
        <div class="d-flex flex-grow-1" style="min-height:0px;">
            <div class="bg-body-tertiary flex-shrink-0 left">
                <?php
                include('elements/menu.php')
                ?>
            </div>
                <div class="main">
                    <?php
                    include('../../backend/retrieve_posts.php');
                    include('elements/feed.php');
                    ?>
                </div>
            <div class="flex-shrink-0" class="right">
            </div>
        </div>
    </div>
</body>
</html>