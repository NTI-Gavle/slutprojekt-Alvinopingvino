<?php
include_once(__DIR__ . '/../../../backend/base_url.php');

foreach ($posts as $post) {

    $stmt = $dbconn->query("SELECT * FROM users WHERE id = {$post['author']}");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);   
    echo ('
        <a style="color: black; text-decoration: none;" href="' . BASE_URL . 'frontend/php/post.php?post_id=' . $post['id'] . '">
            <div class="mt-3">
                <div class="d-flex flex-row">
                    <div>
                        <img class="large_pfp rounded-circle" src="' . BASE_URL . 'backend/uploads/' . htmlspecialchars($user['profile_pic']) . '" alt="pfp"">
                    </div>
                    <div style="margin-left: 5px;">
                        <span class="fw-bold text-decoration-underline">' . htmlspecialchars($user['name']) . '</span>
                        <h3 class="post_title fw-bold" style="margin:0px;"> ' . htmlspecialchars($post['title']) . '</h3>
                    </div>
                </div>
                <p class="post_content"> ' . htmlspecialchars($post['content']) .  ' </p>
            </div>
        </a>
        <HR>
        ');
}
