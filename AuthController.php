<?php
require_once '../config.php';
require_once '../models/User.php';

class AuthController {
    public function loginAction() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

            $userModel = new User();
            if ($userModel->authenticate($email, $password)) {
                header("Location: /dashboard"); exit;
            } else {
                $_SESSION['message'] = "Неверный адрес электронной почты или пароль.";
                header("Location: /login"); exit;
            }
        }
    }

    public function registerAction() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

            if (strlen($password) >= 8 && preg_match('/^[\w\s]+$/', $name)) {
                $userModel = new User();
                if ($userModel->createUser($name, $email, $password)) {
                    $_SESSION['message'] = "Вы успешно зарегистрированы!";
                    header("Location: /login"); exit;
                } else {
                    $_SESSION['message'] = "Ошибка регистрации.";
                    header("Location: /register"); exit;
                }
            } else {
                $_SESSION['message'] = "Некорректные данные";
                header("Location: /register"); exit;
            }
        }
    }

    public function logoutAction() {
        User::logout();
        header("Location: /home"); exit;
    }
}
