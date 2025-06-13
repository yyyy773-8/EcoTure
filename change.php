<?php
session_start();
include 'db.php';
$id = $_SESSION['user_id'];
$old = $_POST['old_password'];
$new = $_POST['new_password'];
$confirm = $_POST['confirm_password'];

$user = $conn->query("SELECT password FROM users WHERE id=$id")->fetch_assoc();
if (!password_verify($old, $user['password'])) {
  die("Неверный старый пароль");
}
if ($new !== $confirm) {
  die("Пароли не совпадают");
}
$hash = password_hash($new, PASSWORD_DEFAULT);
$conn->query("UPDATE users SET password='$hash' WHERE id=$id");
header("Location: profile.php");
?>
