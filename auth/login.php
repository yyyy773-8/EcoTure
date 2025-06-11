<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 text-center">
    <?php if(isset($_SESSION['message'])): ?>
        <p class="alert alert-warning mb-3"><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>
    <h2>Вход в систему</h2>
    <form method="post" action="/login">
        <div class="mb-3">
            <label for="email">E-mail:</label><br>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">Пароль:</label><br>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="/register" class="ml-3">Нет аккаунта? Зарегистрируйтесь.</a>
    </form>
</div>
</body>
</html>
