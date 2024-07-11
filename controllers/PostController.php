<?php
include_once '../config/Database.php';
include_once '../models/Post.php';

class PostController {
    private $db;
    private $post;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->post = new Post($this->db);
    }

    public function create($user_id, $title, $content) {
        $this->post->user_id = $user_id;
        $this->post->title = $title;
        $this->post->content = $content;
        return $this->post->create();
    }

    public function read() {
        return $this->post->read();
    }

    public function getPostById($id) {
        return $this->post->getPostById($id);
    }

    public function update($id, $user_id, $title, $content) {
        $this->post->id = $id;
        $this->post->user_id = $user_id;
        $this->post->title = $title;
        $this->post->content = $content;
        return $this->post->update();
    }
}
