<?php
include_once("db_conn.php");
include_once("admin/data/Post.php");

function display_articles() {
    global $conn;
    $posts = getAll($conn);

    if ($posts != 0) {
        foreach ($posts as $post) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<img src="upload/blog/' . $post['cover_url'] . '" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $post['post_title'] . '</h5>';
            $p = strip_tags($post['post_text']);
            $p = substr($p, 0, 200);
            echo '<p class="card-text">' . $p . '...</p>';
            echo '<a href="blog-view.php?post_id=' . $post['post_id'] . '" class="btn btn-primary">Read more</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-warning">No posts yet.</div>';
    }
}
?>