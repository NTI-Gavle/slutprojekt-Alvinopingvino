    <?php
    include_once(__DIR__ . '/../../../backend/base_url.php');

    if (count($posts) == 0){
        echo ('<p class="text-center mt-5">No posts found!</p>');
    }

    foreach ($posts as $post) {

        $stmt = $dbconn->query("SELECT * FROM users WHERE id = {$post['author']}");
        $user = $stmt->fetch(PDO::FETCH_ASSOC);   
        $post['content'] = preg_replace('/\[img.*?\].*?\[\/img\]/is', '', $post['content']);
        echo ('
            <a class="link-dark text-decoration-none" href="' . BASE_URL . 'frontend/php/post.php?post_id=' . $post['id'] . '">
                <div class="mt-3 p-3 post">
                    <div class="d-flex flex-row">
                        <div>
                            <img class="large_pfp rounded-circle" src="' . BASE_URL . 'backend/uploads/' . htmlspecialchars($user['profile_pic']) . '" alt="Profile picture of ' . htmlspecialchars($user['name']) . '">
                        </div>
                        <div class="ms-1">
                            <span class="fw-bold text-decoration-underline">' . htmlspecialchars($user['name']) . '</span>
                            <h3 class="post_title fw-bold" m-0> ' . htmlspecialchars($post['title']) . '</h3>
                        </div>
                    </div>
                    <p class="post_content"> ' . htmlspecialchars($post['content']) .  ' </p>
                    <div class="text-left d-flex">
                        <button id="like_btn_' . htmlspecialchars($post['id']) . '" class="btn d-inline-flex align-items-center justify-content-center" title="Like" onclick="event.preventDefault(); event.stopPropagation(); Like('. htmlspecialchars($post['id']) .')" aria-label="Like post">
                            
                        </button>
                        <p id="like_counter_' . htmlspecialchars($post['id']) . '" class="d-inline-flex align-items-center justify-content-center mb-0 ms-1"></p>
                    </div>
                </div>
            </a>
            <HR>
            ');
    }
