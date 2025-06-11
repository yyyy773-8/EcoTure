<?php
class User {
    private $db;
    
    function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    // Регистрация нового пользователя
    public function createUser($name, $email, $password) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users(name, email, password, created_at) VALUES(:name, :email, :password, NOW())");
            return $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Авторизация пользователя
    public function authenticate($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
            $stmt->execute([':email' => $email]);
            
            if ($stmt->rowCount() > 0) {
                $userData = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($password, $userData['password'])) {
                    session_start();
                    $_SESSION['user'] = [
                        'id' => $userData['id'],
                        'name' => $userData['name'],
                        'email' => $userData['email']
                    ];
                    
                    return true;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        return false;
    }

    // Получаем данные текущего пользователя
    public static function currentUser() {
        if (!isset($_SESSION)) { session_start(); }
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    // Проверяем наличие сессии пользователя
    public static function isLoggedIn() {
        return self::currentUser() !== null;
    }

    // Выход пользователя
    public static function logout() {
        session_destroy();
    }
}
