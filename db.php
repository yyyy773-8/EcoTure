<?php
require 'auth.php';
check_auth();
require 'db.php';

$user_id = $_SESSION['user_id'];
// Получаем текущие данные
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($current_name, $current_email);
$stmt->fetch();
$stmt->close();

// Обработка POST-запроса
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = trim($_POST['name']);
    $new_email = trim($_POST['email']);
    if (strlen($new_name) < 2) {
        $error = "Имя должно быть минимум 2 символа.";
    } elseif (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
        $error = "Некорректный email.";
    } else {
        // Проверка: нет ли другого пользователя с этим email
        $stmt2 = $conn->prepare("SELECT id FROM users WHERE email = ? AND id <> ?");
        $stmt2->bind_param("si", $new_email, $user_id);
        $stmt2->execute();
        $stmt2->store_result();
        if ($stmt2->num_rows > 0) {
            $error = "Email уже занят другим пользователем.";
        }
        $stmt2->close();
    }
    if (!$error) {
        $stmt3 = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt3->bind_param("ssi", $new_name, $new_email, $user_id);
        if ($stmt3->execute()) {
            $_SESSION['user_name'] = $new_name; // обновляем сессию
            $success = "Данные успешно обновлены.";
            $current_name = $new_name;
            $current_email = $new_email;
        } else {
            $error = "Ошибка при обновлении данных.";
        }
        $stmt3->close();
    }
}

include 'header.php';
?>
<div class="container py-5">
    <h1 class="mb-4">Редактирование профиля</h1>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($current_name) ?>" required minlength="2">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($current_email) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="profile.php" class="btn btn-secondary ms-2">Отмена</a>
    </form>
</div>
<?php include 'footer.php'; ?>
