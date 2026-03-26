    <?php
    include_once(__DIR__ . '/../../../backend/base_url.php');

    if (count($posts) == 0){
        echo ('<p class="text-center">This account has not published any posts yet!</p>');
    }

    foreach ($posts as $post) {

        $stmt = $dbconn->query("SELECT * FROM users WHERE id = {$post['author']}");
        $user = $stmt->fetch(PDO::FETCH_ASSOC);   
        echo ('
            <a class="link-dark text-decoration-none" href="' . BASE_URL . 'frontend/php/post.php?post_id=' . $post['id'] . '">
                <div class="mt-3 post">
                    <div class="d-flex flex-row">
                        <div>
                            <img class="large_pfp rounded-circle" src="' . BASE_URL . 'backend/uploads/' . htmlspecialchars($user['profile_pic']) . '" alt="pfp"">
                        </div>
                        <div class="ms-1">
                            <span class="fw-bold text-decoration-underline">' . htmlspecialchars($user['name']) . '</span>
                            <h3 class="post_title fw-bold" m-0> ' . htmlspecialchars($post['title']) . '</h3>
                        </div>
                    </div>
                    <p class="post_content"> ' . htmlspecialchars($post['content']) .  ' </p>
                </div>
            </a>
            <HR>
            ');
    }
