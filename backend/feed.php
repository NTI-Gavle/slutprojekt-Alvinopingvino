<?php
include('db_connect.php');
include_once('base_url.php');

$stmt = $dbconn->query('SELECT * FROM posts');
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {

    $stmt = $dbconn->query("SELECT * FROM users WHERE id = {$post['author']}");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo ('
        <a style="color: black; text-decoration: none;" href="' . BASE_URL . 'frontend/php/post.php?post_id=' . $post['id'] . '">
            <div class="post">
                <div class="post_header">
                    <div>
                        <img class="pfp" src="' . BASE_URL . 'backend/uploads/' . $user['profile_pic'] . '" alt="pfp"">
                    </div>
                    <div style="margin-left: 5px;">
                        <span class="username">' . $user['name'] . '</span>
                        <h3 style="margin:0px"> ' . $post['title'] . '</h3>
                    </div>
                </div>
                <p> ' . $post['content'] .  ' </p>
            </div>
        </a>
        ');
}
