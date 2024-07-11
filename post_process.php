<?php
include_once 'controllers/PostController.php';
session_start();

$postController = new PostController();
if ($postController->create($_SESSION['user_id'], $_POST['title'], $_POST['content'])) {
    header("Location: public/index.php");
} else {
    echo "Error creating post.";
}
