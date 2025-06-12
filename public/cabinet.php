<?php
require '../config/database.php';
require '../app/controllers/AuthController.php';
require '../app/controllers/UserController.php';

$authController = new AuthController();
$userController = new UserController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'register':
            $authController->register();
            break;
        case 'login':
            $authController->login();
            break;
        case 'logout':
            $authController->logout();
            break;
        case 'dashboard':
            $userController->dashboard();
            break;
        default:
            include '../app/views/home.php'; // Главная страница с описанием услуг
            break;
    }
} else {
    include '../app/views/home.php'; // Главная страница по умолчанию
}
?>
