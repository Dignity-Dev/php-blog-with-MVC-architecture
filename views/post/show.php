<?php
// Fetch post data
$postController = new PostController();
$post = $postController->getPostById($_GET['id']);
?>

<h2><?php echo $post['title']; ?></h2>
<p><?php echo $post['content']; ?></p>

<h3>Comments:</h3>
<?php include '../comment/index.php'; ?>

<form method="post" action="comment_process.php">
    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
    <label for="content">Comment:</label>
    <textarea id="content" name="content" required></textarea>
    <br>
    <button type="submit">Add Comment</button>
</form>
