<?php
session_start();
require 'db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$email = $conn->real_escape_string($email);

$result = $conn->query("SELECT id, name, password FROM users WHERE email = '$email'");
if ($result && $user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: profile.php"); // или index.php, если хотите
        exit;
    }
}
// Ошибка
$_SESSION['error'] = "Неверный email или пароль";
header("Location: login.php");
exit;
?>
