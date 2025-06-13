<?php 
session_start();
include 'db.php';
$id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
header("Location: profile.php");
?>
