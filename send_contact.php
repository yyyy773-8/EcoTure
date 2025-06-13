<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // Простейшая защита и валидация
    if (empty($name)  || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ошибка: заполните все поля корректно.";
        exit;
    }

    $to = "info@cleaning.ru"; // Замените на свой email
    $subject = "Сообщение с сайта от $name";
    $body = "Имя: $name\nEmail: $email\n\nСообщение:\n$message";

    if (mail($to, $subject, $body)) {
        echo "Сообщение отправлено!";
    } else {
        echo "Ошибка при отправке.";
    }
}
?>
