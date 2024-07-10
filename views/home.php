<?php
// Display all posts
include_once '../controllers/PostController.php';

$postController = new PostController();
$posts = $postController->read();

while ($row = $posts->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "<h2>{$title}</h2>";
    echo "<p>{$content}</p>";
    echo "<hr>";
}
