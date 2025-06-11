<?php
class User {
    private $db;

    function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    public function createUser($name, $email, $password) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users(name, email, password, created_at) VALUES(:name, :email, :password, NOW())");
            return $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

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
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public static function currentUser() {
        if (!isset($_SESSION)) { session_start(); }
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public static function isLoggedIn() {
        return self::currentUser() !== null;
    }

    public static function logout() {
        session_destroy();
    }

    public function getBasketHistory($userId) {
        try {
            $stmt = $this->db->prepare("SELECT b.id, p.name AS productName, b.quantity, b.created_at 
                                        FROM baskets b JOIN products p ON b.product_id=p.id 
                                        WHERE b.user_id=:userId ORDER BY b.created_at DESC");
            $stmt->execute([':userId' => $userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
