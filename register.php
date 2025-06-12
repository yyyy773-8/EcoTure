<?php
require_once('db.php'); // Исправлена опечатка в require_once

$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass']; // Исправлено имя переменной
$email = $_POST['email'];

if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)) { // Исправлено условие
    echo "Заполните все поля";
} else {
    if ($pass != $repeatpass) {
        echo "Пароли не совпадают";
    } else {
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT); // Хешируем пароль

        // Исправлен SQL-запрос
        $sql = "INSERT INTO users (name, email, password) VALUES ('$login', '$email', '$hashedPass')";

        if ($conn->query($sql) === TRUE) {
            echo "Успешная регистрация";
        } else {
            echo "Ошибка: " . $conn->error; // Добавлено сообщение об ошибке
        }
    }
}
?>
