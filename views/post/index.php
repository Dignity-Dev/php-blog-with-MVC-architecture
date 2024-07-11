<?php
// Fetch all posts
$postController = new PostController();
$posts = $postController->read();

while ($row = $posts->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "<h2>{$title}</h2>";
    echo "<p>{$content}</p>";
    echo "<a href='post/show.php?id={$id}'>Read more</a>";
    echo "<hr>";
}
?>
