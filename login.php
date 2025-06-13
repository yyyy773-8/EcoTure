<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $email = $conn->real_escape_string($email);

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: profile.php');
        exit();
    } else {
        $error = "Неверные данные для входа.";
    }
}

include 'header.php';
?>

<div class="container mt-4">
    <h2>Вход в личный кабинет</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="login.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label">Запомнить меня</label>
        </div>

        <button type="submit" class="btn btn-success w-100">Войти</button>

        <div class="mt-2 text-center">
            <a href="forgot_password.php">Забыли пароль?</a>
        </div>

        <p class="mt-3 text-center">
            Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a>
        </p>
    </form>
</div>

<?php include 'footer.php'; ?>
