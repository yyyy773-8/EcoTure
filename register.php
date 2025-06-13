<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="register.css"> <!-- или вставь CSS в <style> -->
    <style>
        body {
  background-color: #f4f6f9;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  font-family: "Segoe UI", sans-serif;
  margin: 0;
}

.register-container {
  background: #fff;
  padding: 2rem 2.5rem;
  border-radius: 0.5rem;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
  width: 100%;
  max-width: 480px;
  animation: fadeIn 0.4s ease-in-out;
}

.register-container h2 {
  text-align: center;
  margin-bottom: 1.5rem;
}

.register-container .form-control {
  border-radius: 0.3rem;
}

.register-container .form-control:focus {
  border-color: #0d6efd;
  box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
}

.register-container .btn {
  width: 100%;
  padding: 0.5rem 1rem;
}

.register-container .form-text {
  font-size: 0.9rem;
  color: #6c757d;
}

.register-container .form-check-label {
  font-size: 0.9rem;
}

.register-container a {
  text-decoration: none;
}

.register-container a:hover {
  text-decoration: underline;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
    </style>
</head>
<body>

<div class="register-container">
  <h2>Регистрация</h2>
  <form action="register_handler.php" method="post">
    <div class="mb-3">
      <label class="form-label">Имя</label>
      <input type="text" class="form-control" name="name" required minlength="2">
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Пароль</label>
      <input type="password" class="form-control" name="password" required minlength="8">
      <div class="form-text">Минимум 8 символов, включая цифры и буквы</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Подтвердите пароль</label>
      <input type="password" class="form-control" name="confirm_password" required>
    </div>

    <!-- Капча или reCAPTCHA можно сюда -->
    <button type="submit" class="btn btn-primary mt-2">Зарегистрироваться</button>

    <div class="text-center mt-3">
      <span>Уже есть аккаунт? <a href="login.php">Войти</a></span>
    </div>
  </form>
</div>

</body>
</html>
