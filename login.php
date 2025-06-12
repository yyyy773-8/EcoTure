<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация и Вход</title>
</head>
<body>
    <form action="register.php" method="post">
        <input type="text" placeholder="login" name="login" required>
        <input type="password" placeholder="password" name="pass" required> <!-- Исправлено на type=password -->
        <input type="password" placeholder="repeat password" name="repeatpass" required> <!-- Исправлено на type=password -->
        <input type="email" placeholder="email" name="email" required> <!-- Исправлено на type=email -->
        <button type="submit">Зарегистрироваться</button>
    </form>
    <form action="login.php" method="post">
        <input type="text" placeholder="login" name="login" required>
        <input type="password" placeholder="password" name="pass" required> <!-- Исправлено на type=password -->
        <button type="submit">Войти</button>
    </form>
</body>
</html>
