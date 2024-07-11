<?php
// Fetch comments for the post
$commentController = new CommentController();
$comments = $commentController->read($post['id']);

while ($row = $comments->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "<p>{$content} - <strong>User {$user_id}</strong></p>";
    echo "<hr>";
}
?>
