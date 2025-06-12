<?php
include 'auth.php'; // Проверка аутентификации

echo "Welcome, " . $_SESSION['username'] . "!";
echo "<a href='logout.php'>Logout</a>";
?>
