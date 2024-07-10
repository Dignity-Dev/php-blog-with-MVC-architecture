<?php
class Comment {
    private $conn;
    private $table = 'comments';

    public $id;
    public $post_id;
    public $user_id;
    public $content;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET post_id=:post_id, user_id=:user_id, content=:content";
        $stmt = $this->conn->prepare($query);

        $this->content = htmlspecialchars(strip_tags($this->content));

        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':content', $this->content);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " WHERE post_id = :post_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->execute();
        return $stmt;
    }
}
