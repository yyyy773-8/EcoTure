<?php
require 'auth.php';
check_auth();
require 'db.php';

$user_id = $_SESSION['user_id'];
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old = $_POST['old_password'] ?? '';
    $new = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    if (strlen($new) < 8) {
        $error = "Новый пароль должен быть минимум 8 символов.";
    } elseif ($new !== $confirm) {
        $error = "Новый пароль и подтверждение не совпадают.";
    } else {
        // Получаем текущий хеш пароля
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($hash);
        $stmt->fetch();
        $stmt->close();

        if (!password_verify($old, $hash)) {
            $error = "Старый пароль введён неверно.";
        } else {
            $new_hash = password_hash($new, PASSWORD_DEFAULT);
            $stmt2 = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt2->bind_param("si", $new_hash, $user_id);
            if ($stmt2->execute()) {
                $success = "Пароль успешно изменён.";
            } else {
                $error = "Ошибка при изменении пароля.";
            }
            $stmt2->close();
        }
    }
}

include 'header.php';
?>
<div class="container py-5">
    <h1 class="mb-4">Смена пароля</h1>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Старый пароль</label>
            <input type="password" name="old_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Новый пароль</label>
            <input type="password" name="new_password" class="form-control" required minlength="8">
        </div>
        <div class="mb-3">
            <label class="form-label">Подтверждение нового пароля</label>
            <input type="password" name="confirm_password" class="form-control" required minlength="8">
        </div>
        <button type="submit" class="btn btn-warning">Изменить пароль</button>
        <a href="profile.php" class="btn btn-secondary ms-2">Отмена</a>
    </form>
</div>
<?php include 'footer.php'; ?>
