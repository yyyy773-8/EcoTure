<?php
$servername = "localhost"; // или ваш сервер базы данных
$username = "username"; // ваш пользователь базы данных
$password = "password"; // ваш пароль базы данных
$dbname = "database_name"; // имя вашей базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
