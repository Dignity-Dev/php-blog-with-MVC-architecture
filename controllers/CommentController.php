<?php
include_once '../config/Database.php';
include_once '../models/Comment.php';

class CommentController {
    private $db;
    private $comment;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->comment = new Comment($this->db);
    }

    public function create($post_id, $user_id, $content) {
        $this->comment->post_id = $post_id;
        $this->comment->user_id = $user_id;
        $this->comment->content = $content;
        return $this->comment->create();
    }

    public function read($post_id) {
        $this->comment->post_id = $post_id;
        return $this->comment->read();
    }
}
