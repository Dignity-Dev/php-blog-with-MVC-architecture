<?php
include_once 'controllers/UserController.php';
session_start();

$userController = new UserController();
if ($userController->login($_POST['username'], $_POST['password'])) {
    $_SESSION['user_id'] = $userController->user->id;
    header("Location: public/index.php");
} else {
    echo "Login failed.";
}
