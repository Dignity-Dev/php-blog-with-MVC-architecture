<?php
include_once 'controllers/CommentController.php';
session_start();

$commentController = new CommentController();
if ($commentController->create($_POST['post_id'], $_SESSION['user_id'], $_POST['content'])) {
    header("Location: public/post/show.php?id=" . $_POST['post_id']);
} else {
    echo "Error creating comment.";
}
