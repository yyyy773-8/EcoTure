<?php
require_once '../config/database.php';

class UserController {
    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /public/login.php');
            exit;
        }

        // Получение данных пользователя и его расчетов из БД
        // ...
        
        include '../app/views/dashboard.php';
    }

    public function updateProfile() {
        // Обработка изменения данных профиля...
    }

    public function changePassword() {
        // Обработка смены пароля...
    }
}
?>
