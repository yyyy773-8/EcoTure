<?php
session_start();
$host = 'localhost';
$dbname = 'yyyy'; // Укажите название вашей БД
$user = 'root';                 // Ваш юзер mysql
$pass = '';                    // Ваш пароль mysql

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rememberMe = isset($_POST['remember_me']);
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->execute(['username' => $username]);
        $userData = $stmt->fetch();
        
        if (!$userData || !password_verify($password, $userData['password_hash'])) {
            die('Неверное имя пользователя или пароль');
        }
        
        session_regenerate_id(); // обновляем сессию для безопасности
        $_SESSION['logged_in_user'] = [
            'id' => $userData['id'],
            'username' => $userData['username']
        ];
        
        if ($rememberMe) { // Если установлен флажок "Запомнить меня"
            setcookie('remember_me', json_encode($_SESSION), time()+60*60*24*7, '/'); // Cookie действует неделю
        }
        
        header('Location: welcome.php');
        exit();
    }
} catch (\PDOException $e) {
    die("Ошибка подключения к базе данных: {$e->getMessage()}");
}
?>
