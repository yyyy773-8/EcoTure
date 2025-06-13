<?php
$host = 'hz';
$user = 'root';            
$password = '';            
$dbname = 'yyyy';   

$conn = new mysqli($host, $user, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
?>
