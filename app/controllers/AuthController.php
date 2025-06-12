<?php
require_once '../config/database.php';
require_once '../app/models/User.php';

class AuthController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Валидация данных
            if (strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8 || $password !== $confirm_password) {
                // Обработка ошибок...
                return;
            }

            // Хеширование пароля и сохранение пользователя в БД
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $hashed_password])) {
                // Успешная регистрация
                header('Location: /public/index.php');
                exit;
            }
        }
        include '../app/views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Проверка пользователя в БД
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header('Location: /public/index.php');
                exit;
            } else {                // Ошибка входа...
            }
        }
        include '../app/views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /public/index.php');
        exit;
    }
}
?>
