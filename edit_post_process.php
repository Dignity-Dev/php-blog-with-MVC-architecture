<?php
include_once 'controllers/PostController.php';
session_start();

$postController = new PostController();
if ($postController->update($_POST['id'], $_SESSION['user_id'], $_POST['title'], $_POST['content'])) {
    header("Location: public/index.php");
} else {
    echo "Error updating post.";
}
