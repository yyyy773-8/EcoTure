<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta2/css/bootstrap.min.css">
    <title>Регистрация</title>
</head>
<body>
<div class="container">
    <h2>Регистрация</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" name="name" required minlength="2">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" required minlength="8">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Подтверждение пароля</label>
            <input type="password" class="form-control" name="confirm_password" required>
        </div>
        <!-- Добавьте reCAPTCHA здесь -->
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
<script src="/public/js/validation.js"></script>
</body>
</html>
