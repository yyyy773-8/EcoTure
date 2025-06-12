<?php
$servername = "localhost"; // или ваш сервер базы данных
$username = "root"; // ваш пользователь базы данных
$password = ""; // ваш пароль базы данных
$dbname = "yyyy"; // имя вашей базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
