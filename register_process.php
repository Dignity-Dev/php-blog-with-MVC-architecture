<?php
include_once 'controllers/UserController.php';
session_start();

$userController = new UserController();
if ($userController->register($_POST['username'], $_POST['password'])) {
    header("Location: public/user/login.php");
} else {
    echo "Registration failed.";
}
