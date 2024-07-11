<form method="post" action="comment_process.php">
    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
    <label for="content">Comment:</label>
    <textarea id="content" name="content" required></textarea>
    <br>
    <button type="submit">Add Comment</button>
</form>
