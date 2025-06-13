<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<h2>Форма регистрации:</h2>
<form action="register.php" method="post">
    Имя пользователя:<br><input type="text" name="username"><br>
    Пароль:<br><input type="password" name="password"><br>
    Подтверждение пароля:<br><input type="password" name="confirm_password"><br>
    E-mail:<br><input type="email" name="email"><br>
    Запомнить меня?<br><input type="checkbox" name="remember_me"><br>
    <button type="submit">Зарегистрироваться</button>
</form>

<h2>Авторизация:</h2>
<form action="login.php" method="post">
    Имя пользователя:<br><input type="text" name="username"><br>
    Пароль:<br><input type="password" name="password"><br>
    Запомнить меня?<br><input type="checkbox" name="remember_me"><br>
    <button type="submit">Войти</button>
</form>
</body>
</html>
