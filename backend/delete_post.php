<?php
    include('admin_check.php');
    include('db_connect.php');

    if (isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
    }
    
    if ($admin_check['is_admin'] == 1){
        try{
            $stmt = $dbconn -> prepare('DELETE FROM posts WHERE id = ?');
            $stmt -> execute([$post_id]);   
    
            $stmt = $dbconn -> prepare('DELETE FROM likes WHERE post_id = ?');
            $stmt -> execute([$post_id]);
    
            $stmt = $dbconn -> prepare('DELETE FROM comments WHERE post_id = ?');
            $stmt -> execute([$post_id]);
            
            $stmt = $dbconn -> prepare('DELETE FROM files WHERE post_id = ?');
            $stmt -> execute([$post_id]);   
        }
        catch(PDOException $e){
            echo('An error occurred while trying to delete post with post_id ' . $post_id);
        }
    }
?>