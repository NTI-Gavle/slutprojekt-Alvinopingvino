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

    <!--Script-->
    <script src="../js/script.js" defer></script>

    <title>Post creator</title>
</head>

<body onload="setupUpload()">
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
                    <h2>Create post</h2>
                </div>
                <div style="display: flex; justify-content:center;">
                    <form action="../../backend/publish_post.php" method="post" enctype="multipart/form-data" style="width:90%;">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" style="text-align: center" maxlength="100" name="title" placeholder="Title">
                        </div>
                        <div class="input-group mb-3">
                            <textarea type="text" class="form-control grow_with_text" style="min-height:200px;" id="content_input" name="content" placeholder="Content"></textarea>
                        </div>
                        <div class="d-flex flex-wrap justify-content-center w-100 mb-3" id="previewContainer">

                        </div>
                        <input type="file" id="fileInput" name="image" multiple accept=".jpg, .jpeg, .png, .gif" style="display:none;">

                        <div class="input-group mb-3 d-inline-flex align-items-center justify-content-center">
                            <button type="button" title="Upload Image" class="btn d-inline-flex align-items-center justify-content-center" onclick="document.getElementById('fileInput').click();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                </svg>
                            </button>
                            <button type="submit" title="Publish Post" class="btn d-inline-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </main>
            <div class="right">
            </div>
        </div>
</body>

</html>