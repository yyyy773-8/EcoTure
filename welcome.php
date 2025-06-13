<?php
session_start();
if (!isset($_SESSION['logged_in_user'])) {
    header('Location: cabinet.html');
    exit();
}

echo "<p>Привет, ".$_SESSION['logged_in_user']['username']."!</p>";
echo '<a href="logout.php">Выйти</a>';
?>
