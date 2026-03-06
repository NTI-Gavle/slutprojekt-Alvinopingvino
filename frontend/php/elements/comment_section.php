<?php
include_once(__DIR__ . '/../../../backend/retrieve_comments.php');
?>

<div>
    <div class="center">
        <?php
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
        ?>
        <form action="../../backend/publish_comment.php?post_id=<?php $id ?>" method="post" style="width:90%;">
            <div class="input-group mb-3">
                <textarea type="text" class="form-control grow_with_text" name="content" placeholder="Comment"></textarea>
                <button class="btn submit_btn" style="display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
    <div class="comment_section">
        <?php
        foreach ($comments as $comment) {
            echo (htmlspecialchars($comment['content']));
        }
        ?>
    </div>
</div>