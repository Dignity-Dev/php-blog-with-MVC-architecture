<?php
// Fetch post data
$postController = new PostController();
$post = $postController->getPostById($_GET['id']);
?>

<form method="post" action="edit_post_process.php">
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" required>
    <br>
    <label for="content">Content:</label>
    <textarea id="content" name="content" required><?php echo $post['content']; ?></textarea>
    <br>
    <button type="submit">Update Post</button>
</form>
