<?php
include_once '../config/Database.php';
include_once '../models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register($username, $password) {
        $this->user->username = $username;
        $this->user->password = $password;
        return $this->user->register();
    }

    public function login($username, $password) {
        $this->user->username = $username;
        $this->user->password = $password;
        return $this->user->login();
    }
}
