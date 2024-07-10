<?php
class User {
    private $conn;
    private $table = 'users';

    public $id;
    public $username;
    public $password;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $query = "INSERT INTO " . $this->table . " SET username=:username, password=:password";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login() {
        $query = "SELECT id, username, password FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $this->username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($this->password, $user['password'])) {
            $this->id = $user['id'];
            $this->username = $user['username'];
            return true;
        }
        return false;
    }
}
